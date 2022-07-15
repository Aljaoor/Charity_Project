<?php

namespace App\Http\Controllers;

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
use function PHPUnit\Framework\isEmpty;


class RequestForHelpController extends Controller
{

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
        ],);


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

            $files          =       array();

            if($request->hasfile('proof_image'))
            {
                foreach($request->file('proof_image') as $proof_image)
                {
                    $name               =       $proof_image->getClientOriginalName();



                    if($proof_image->move(public_path('proof_image/'.$request->office_id), $name)) {
                        $request_id=request_for_help::latest()->first()->id;


                        $files[]            =       $name;
                        $upload_status      =       request_proof::create(["image_name" => $name,"request_id"=>$request_id]);

                    }
                }
            }

            if(!is_null($upload_status)) {
                return redirect()->route('home')->with('alert','Your request has been sent and you will be contacted as soon as possible.  ');            }

            else {
                return back()->with('failed', 'Alert! images not uploaded');
            }
        }

        }
    }



    public function Waiting()
    {
        $request_Waiting = request_for_help::whereStatus(3)->get();
//        $event=Event::select('title')->get();

        return view('website.requests_for_help.request_waiting')->with(['request_Waiting'=>$request_Waiting]);


    }


    public function details($request_id)
    {
        $details = request_for_help::whereId($request_id)->first();
        $request_proof = request_proof::whereRequestId($request_id)->get();

        return view('website.requests_for_help.details')->with(['details'=>$details,'request_proof'=>$request_proof]);


    }









    public function yourRequest(){

        if (\auth()->user()->role_id==3){
            $status=Event_volunteer::whereVolunteerId(\auth()->user()->id)->get();

            return view('website.request.yourRequest')->with('status',$status);



        }

    }


}
