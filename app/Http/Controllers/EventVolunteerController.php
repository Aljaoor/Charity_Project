<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Event_volunteer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;


class EventVolunteerController extends Controller
{
    public function volunteering($id)
    {
        $co = Event::whereId($id)->firstOrFail();
        $count_of_volunteers = $co->count_of_volunteers;
        $counter = Event_volunteer::whereEventId($id)->count();




        if (auth()->user()->role_id == 3) {


            if ($counter < $count_of_volunteers) {
                $eventvolunteer = new Event_volunteer();
                $eventvolunteer->event_id = $id;
                $eventvolunteer->volunteer_id = auth()->user()->id;
                $eventvolunteer->status = 3;
                $eventvolunteer->save();
                return redirect()->route('home')->with('alert', 'welcome to our Event');

            } else {
                return redirect()->route('home')->with('volunteering', 'Sorry,we have enough number of volunteers');


            }
        }

        else {
            return redirect()->route('home')->with('volunteering', 'please sign in as a volunteer and try again  ');

        }


    }

    public function view()
    {
        $volunteerrequest = Event_volunteer::get();
        $event=Event::select('title')->get();
        return view('website.request.acceptingrequests',compact('event','volunteerrequest'));


    }
    public function acceptable()
    {

        $volunteerrequest = Event_volunteer::whereStatus(1)->get();
        $event=Event::select('title')->get();
        return view('website.request.acceptingrequests')->with(['volunteerrequest'=>$volunteerrequest,'event'=>$event]);


    }
    public function rejected()
    {
        $volunteerrequest = Event_volunteer::whereStatus(2)->get();
        $event=Event::select('title')->get();
        return view('website.request.acceptingrequests')->with(['volunteerrequest'=>$volunteerrequest,'event'=>$event]);


    }
    public function pending()
    {
        $volunteerrequest = Event_volunteer::whereStatus(3)->get();
        $event=Event::select('title')->get();
        return view('website.request.acceptingrequests')->with(['volunteerrequest'=>$volunteerrequest,'event'=>$event]);


    }


    public function processing($vid , $eid)
    {
        $request_accept=Event_volunteer::whereVolunteerId($vid)->whereEventId($eid)->firstOrFail();
        $request_accept->status=1;
        $request_accept->cancellation_reason="";
        $request_accept->update();

//        $volunteerrequest = Event_volunteer::get();
//        $event=Event::select('title')->get();



        return redirect()->back();

    }
    public function deny(Request $request)
    {

        $request_deny=Event_volunteer::whereVolunteerId($request->vid)->whereEventId($request->eid)->firstOrFail();
        $request_deny->status=2;
        $request_deny->cancellation_reason=$request->Reason;
        $request_deny->update();
        $volunteerrequest = Event_volunteer::get();
        $event=Event::select('title')->get();
        return redirect()->back()->with(['volunteerrequest'=>$volunteerrequest,'event'=>$event]);


    }


    public function searchEvent(Request $request)
    {
        $event_name=$request->search;
        $event_id=Event::select('id')->whereTitle($event_name)->firstOrFail();
        $volunteerrequest = Event_volunteer::whereEventId($event_id->id)->get();
        $event=Event::select('title')->get();
        return view('website.request.acceptingrequests',compact('event','volunteerrequest','event_name'));


    }
}
