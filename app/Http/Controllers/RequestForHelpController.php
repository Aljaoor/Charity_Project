<?php

namespace App\Http\Controllers;

use App\Mail\request_help;
use App\Models\Beneficiary;
use App\Models\request_proof;
use Illuminate\Http\Request;

use App\Models\Event_volunteer;
use App\Models\Office;
use App\Models\request_for_help;
use Illuminate\Support\Facades\Storage;
use File;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Notification;



class RequestForHelpController extends Controller
{

    function __construct()
    {
        $this->middleware('permission:show request help|send request help', ['only' => ['add','create']]);

        $this->middleware('permission:show request help',['only' => ['all','Waiting','rejected','Beneficiaries','details','delete_request','search_office','deny','']]);



    }

    public function add(){

        $offices=Office::get();
        return view('website.requests_for_help.add')->with('offices',$offices);

    }



    public function create(Request $request){

        if (request_for_help::whereOfficeId($request->office_id)->whereMemberId(auth()->user()->id)->first()){
            return back()->with('failed','You already have a request for this office. ');
        }

        else{



        $validatedData = $request->validate([
            'proof_image' => 'required',
        ]);


        $office_count_family=Office::whereId($request->office_id)->firstOrFail()->family_count_condition;

        $count_member_beneficiary=Beneficiary::whereOfficeId($request->office_id)->count();
        $max_member_count=Office::whereId($request->office_id)->firstOrFail()->max_member_count;

        if ($request->family_count >$office_count_family){

            return redirect()->route('home')->with('volunteering',"Sorry, but this office is not for families with more than $office_count_family members.");

        }
        elseif ($count_member_beneficiary >=$max_member_count ){

            return redirect()->route('home')->with('volunteering',"We're sorry, but this office has been enough for a number of people who can help them.");

        }
        else{
        $req= new request_for_help();
        $req->family_count = $request->family_count;
        $req->office_id = $request->office_id;
        $req->reason_of_request = $request->reason_of_request;
        $req->member_id=auth()->user()->id;

        $req->save();

        $office_name=Office::whereId($request->office_id)->first()->name;
            $details = [
                'type' => $office_name,
                'body' => 'People have sent a request need to help from this office :',
                'id' => 'send_help',
            ];


            $user = Auth::user()->whereRoleId(1)->get();

            Notification::send($user, new \App\Notifications\request_help($details));

            $files          =       array();

            if($request->hasfile('proof_image'))
            {
                foreach($request->file('proof_image') as $proof_image)
                {
                    $name               =       $proof_image->getClientOriginalName();


                    $request_id=request_for_help::latest()->first()->id;

                    if($proof_image->move(public_path('proof_image/'.$request_id), $name)) {


                        $files[]            =       $name;
                        $upload_status      =       request_proof::create(["image_name" => $name,"request_id"=>$request_id]);

                    }
                }
            }

            if(!is_null($upload_status)) {
                return redirect()->route('home')->with('alert','Your request has been sent and you will be contacted as soon as possible.  ');


            }

            else {
                return back()->with('failed', 'Alert! images not uploaded');
            }
        }

        }
    }


    public function all()
    {
        $request_Waiting = request_for_help::get();
        $office=Office::select('name')->get();

        return view('website.requests_for_help.all_request')->with(['request_Waiting'=>$request_Waiting ,"office"=>$office]);


    }
    public function Waiting()
    {
        $request_Waiting = request_for_help::whereStatus(3)->get();
        $office=Office::select('name')->get();

        return view('website.requests_for_help.request_waiting')->with(['request_Waiting'=>$request_Waiting ,"office"=>$office]);


    }
    public function rejected()
    {
        $request_Waiting = request_for_help::whereStatus(2)->get();
        $office=Office::select('name')->get();

        return view('website.requests_for_help.request_rejected')->with(['request_Waiting'=>$request_Waiting ,"office"=>$office]);


    }
    public function Beneficiaries()
    {
        $request_Waiting = request_for_help::whereStatus(1)->get();
        $office=Office::select('name')->get();

        return view('website.requests_for_help.Beneficiaries')->with(['request_Waiting'=>$request_Waiting ,"office"=>$office]);


    }




    public function details($request_id)
    {
        $details = request_for_help::whereId($request_id)->first();
        $request_proof = request_proof::whereRequestId($request_id)->get();

        return view('website.requests_for_help.details')->with(['details'=>$details,'request_proof'=>$request_proof]);


    }

    public function delete_request($request_id){

        File::deleteDirectory(public_path('/proof_image' . '/' . $request_id));

        request_for_help::whereId($request_id)->first()->delete();
        return back();



    }

    public function search_office(Request $request){

        if ($request->status==0) {
            if ($request->search=="all"){
                $request_Waiting = request_for_help::get();
                $office = Office::select('name')->get();

                return view('website.requests_for_help.all_request')->with(['request_Waiting' => $request_Waiting, "office" => $office]);


            }else{
                $office_name=$request->search;
                $office_id = Office::whereName($office_name)->first()->id;
                $request_Waiting = request_for_help::whereOfficeId($office_id)->get();
                $office = Office::select('name')->get();

                return view('website.requests_for_help.all_request')->with(['request_Waiting' => $request_Waiting, "office" => $office,"office_name"=>$office_name]);

            }}


        if ($request->status==3) {
            if ($request->search=="all"){
                $request_Waiting = request_for_help::whereStatus(3)->get();
                $office = Office::select('name')->get();

                return view('website.requests_for_help.request_waiting')->with(['request_Waiting' => $request_Waiting, "office" => $office]);


            }else{
            $office_name=$request->search;
            $office_id = Office::whereName($office_name)->first()->id;
            $request_Waiting = request_for_help::whereOfficeId($office_id)->whereStatus(3)->get();
            $office = Office::select('name')->get();

            return view('website.requests_for_help.request_waiting')->with(['request_Waiting' => $request_Waiting, "office" => $office,"office_name"=>$office_name]);

        }}

        if ($request->status==2) {
            if ($request->search=="all"){
                $request_Waiting = request_for_help::whereStatus(2)->get();
                $office = Office::select('name')->get();

                return view('website.requests_for_help.request_rejected')->with(['request_Waiting' => $request_Waiting, "office" => $office]);


            }else{
                $office_name=$request->search;
                $office_id = Office::whereName($office_name)->first()->id;
                $request_Waiting = request_for_help::whereOfficeId($office_id)->whereStatus(2)->get();
                $office = Office::select('name')->get();

                return view('website.requests_for_help.request_rejected')->with(['request_Waiting' => $request_Waiting, "office" => $office,"office_name"=>$office_name]);

            }}

        if ($request->status==1) {
            if ($request->search=="all"){
                $request_Waiting = request_for_help::whereStatus(1)->get();
                $office = Office::select('name')->get();

                return view('website.requests_for_help.Beneficiaries')->with(['request_Waiting' => $request_Waiting, "office" => $office]);


            }else{
                $office_name=$request->search;
                $office_id = Office::whereName($office_name)->first()->id;
                $request_Waiting = request_for_help::whereOfficeId($office_id)->whereStatus(1)->get();
                $office = Office::select('name')->get();

                return view('website.requests_for_help.Beneficiaries')->with(['request_Waiting' => $request_Waiting, "office" => $office,"office_name"=>$office_name]);

            }}





    }


    public function deny(Request $request)
    {



        $request_deny=request_for_help::whereId($request->request_id)->firstOrFail();
        $request_deny->status=2;
        $request_deny->cancellation_reason=$request->Reason;
        $request_deny->request_verified_at= now();

        $request_deny->update();

        Beneficiary::whereOfficeId($request_deny->office_id)->whereMemberId($request_deny->member_id)->delete();


        $details = [

            'body' => 'Your request was refused help because:',
            'id' => 'deny_help',
            'type'=> $request_deny->cancellation_reason,
            'thanks' => "thank you" ,
        ];


        $user = Auth::user()->whereId($request_deny->member_id)->first();

        Notification::send($user, new \App\Notifications\request_help($details));

        \Mail::to($user)->send(new request_help($details));




        return back();



    }











    public function yourRequest(){

        if (\auth()->user()->role_id==3){
            $status=Event_volunteer::whereVolunteerId(\auth()->user()->id)->get();

            return view('website.request.yourRequest')->with('status',$status);


        }
        elseif (\auth()->user()->role_id==2){
            $status=request_for_help::whereMemberId(\auth()->user()->id)->get();


                return view('website.requests_for_help.yourRequest')->with(["status" => $status]);

        }

    }






}
