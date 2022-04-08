<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use File;

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

        return redirect()->route('event.index');




    }



    public  function single($id){
        $event=Event::whereId($id)->firstOrFail();
        return view('website.event.event-single')->with('event',$event);

    }

    public function edit($id){

        $event=Event::whereId($id)->firstOrFail();
        return view('website.event.edit')->with('event',$event);

    }


    public function update(Request $request){

        $event_id= $request->id;
        $old=Event_attachment::whereEventId($event_id)->first();
        if ($old === null) {
            // $old doesn't exist
            $event=Event::whereId($event_id)->firstOrFail();
            $event->title = $request->title;
            $event->where = $request->where;
            $event->from_date = $request->from_date;
            $event->to_date = $request->to_date;
            $event->count_of_volunteers = $request->count_of_volunteers;
            $event->describe = $request->describe;
            $event->location = $request->location;


            if($request->has('event_image')) {
                $image = $request->file('event_image');
                $filename = $image->getClientOriginalName();
                $image->move(public_path('Event_Attachments/' . $event_id), $filename);
                $event->image = $request->file('event_image')->getClientOriginalName();


                $attachments = new Event_attachment();
                $attachments->file_name = $filename;
                $attachments->event_id = $event_id;
                $attachments->save();

            }

            $event->update();

            session()->flash('edit', 'تم التعديل event ');
            return redirect()->route('event.index');

        }

        else{
            Storage::disk('public_uploads')->delete($old->event_id.'/'.$old->file_name);

            $event=Event::whereId($event_id)->firstOrFail();
            $event->title = $request->title;
            $event->where = $request->where;
            $event->from_date = $request->from_date;
            $event->to_date = $request->to_date;
            $event->count_of_volunteers = $request->count_of_volunteers;
            $event->describe = $request->describe;
            $event->location = $request->location;



                $image = $request->file('event_image');
                $filename = $image->getClientOriginalName();
                $image->move(public_path('Event_Attachments/' . $event_id), $filename);
                $event->image = $request->file('event_image')->getClientOriginalName();


                $attachments = Event_attachment::whereEventId($event_id)->firstOrFail();
                $attachments->file_name = $filename;
                $attachments->update();



            $event->update();

            session()->flash('edit', 'تم التعديل event ');
            return redirect()->route('event.index');
        }

    }



    public function delete($id){

        File::deleteDirectory(public_path('/Event_Attachments'.'/'.$id));



//        $image=Event_attachment::whereEventId($id)->first();
//        Storage::disk('public_uploads')->delete($image->event_id.'/');
//        $image->delete();
//
//        $folder = Folder::find($id);
//
//
//        $folder=Event_attachment::find($id);
//        $folder_path = public_path('Event_Attachments/'.$id);
//       delete($folder_path);
//        Storage::deleteDirectory(public_path('Event_Attachments/'.$id));
//
//        return $folder_path;



        Event::whereId($id)->delete();

        session()->flash('delete', 'تم الحدف event ');

        return redirect()->route('event.index');


    }
    public  function contact(){
        return view('website.contact');
    }

}
