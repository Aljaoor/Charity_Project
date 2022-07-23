<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Event_attachment;
use App\Models\Office;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Storage;

class OfficeController extends Controller
{


    function __construct()
    {
        $this->middleware('permission:add office|edit office|delete office', ['only' => ['add','create']]);
        $this->middleware('permission:add office', ['only' => ['create','add']]);
        $this->middleware('permission:edit office', ['only' => ['edit','update']]);
        $this->middleware('permission:delete office', ['only' => ['delete']]);
    }


    public function  show(){


       $office=Office::get();
        return view('website.office.office')->with(['office'=>$office]) ;


    }
    public function edit($id){

       $office=Office::whereId($id)->firstOrFail();
        return view('website.office.edit')->with('office',$office);

    }

    public  function add(){

        return view('website.office.add');

    }
    public function create ( Request $request ) {

//        $validatedData = $request->validate([
//            'where' => 'required|max:255',
//            'count_of_volunteers' => 'required',
//        ],[
//
//            'where.required' =>'يرجي ادخال اسم المكان',
//            'count_of_volunteers.required' =>'يرجي ادخال عدد المتطوعين',
//
//        ]);

        $office = new Office();
        $office->family_count_condition= $request->family_count_condition;
        $office->max_member_count = $request->max_member_count;
        $office->name= $request->name;
        $office->save();


//        $user = User::get();
//        $event_id = Event::latest()->first()->id;
//        Notification::send($user, new \App\Notifications\add_event($event_id));


        return redirect()->route('office.show')->with('add','Successfully Added ');;




    }

    public function update(Request $request){

        $office_id= $request->id;
        $office=Office::whereId($office_id)->first();

        $office->family_count_condition= $request->family_count_condition;
        $office->max_member_count = $request->max_member_count;
        $office->name= $request->name;
        $office->update();
        return redirect()->route('office.show');



    }
    public function delete($id){
        Office::whereId($id)->delete();

        session()->flash('delete', 'Successfully Deleted ');

        return redirect()->route('office.show');

    }

}
