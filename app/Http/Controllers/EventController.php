<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;


use App\Models\Event_attachment;
use function GuzzleHttp\Promise\all;

class EventController extends Controller
{
    public function  index(){
        $event=Event::get();
//$W=Event::whereMonth("from_date")->get();
        return view('website.event.event')->with(['event'=>$event]) ;



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

        $event = new Event();
        $event->where = $request->where;
        $event->describe = $request->describe;
        $event->from_date = $request->from_date;
        $event->to_date = $request->to_date;
        $event->location = $request->location;

        $event->count_of_volunteers = $request->count_of_volunteers;
        $event->image = $request->file('event_image')->getClientOriginalName();
        $event->title = $request->title;
        $event->save();

//        Event::create([
//
//            'where' => $request->where,
//            'describe' => $request->describe,
//            'from_date' => $request->from_date,
//            'to_date' => $request->to_date,
//            'count_of_volunteers' => $request->count_of_volunteers,
//            'title' => $request->title,
//        ]);

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
        session()->flash('Add', 'تم اضافة event ');

        return back();




    }



    public  function single($id){
        $event=Event::whereId($id)->firstOrFail();
        return view('website.event.event-single')->with('event',$event);

    }
}
