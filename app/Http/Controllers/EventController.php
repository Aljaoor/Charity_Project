<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use App\Models\Event_attachment;

class EventController extends Controller
{
    public function  index(){

        return view('website.event');
    }
    public  function add(){

        return view('website.event.add');

    }
    public function create ( Request $request ) {


        $validatedData = $request->validate([
            'where' => 'required|max:255',
            'count_of_volunteers' => 'required',
        ],[

            'where.required' =>'يرجي ادخال اسم المكان',
            'count_of_volunteers.required' =>'يرجي ادخال عدد المتطوعين',

        ]);

        Event::create([
            'where' => $request->where,
            'describe' => $request->describe,
            'from_date' => $request->from_date,
            'to_date' => $request->to_date,
            'count_of_volunteers' => $request->count_of_volunteers,


        ]);
        if ($request->hasFile('event_image')) {

            $event_id = Event::latest()->first()->id;
            $image = $request->file('event_image');
            $file_name = $image->getClientOriginalName();


            $attachments = new Event_attachment();
            $attachments->file_name = $file_name;
            $attachments->event_id = $event_id;
            $attachments->save();

            // move pic
            $request->event_image->move(public_path('Event_Attachments/' . $event_id), $file_name);
        }
        session()->flash('Add', 'تم اضافة القسم بنجاح ');

        return back();







    }



    public  function single(){
        return view("website.event-single");

    }
}
