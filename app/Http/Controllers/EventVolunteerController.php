<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Event_volunteer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
use App\Mail\process;
use function MongoDB\BSON\toJSON;


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
                $count_of_request=Event::whereId($id)->firstOrFail();

                $count_of_request->count_of_request++;
                $count_of_request->update();

                $event_name=Event::whereId($id)->first('title')->title;


                $details = [
                    'event' => $event_name,
                    'body' => 'People have sent a request to volunteer for the event :',
                    'id' => 'send',
//                    'count' => $count_of_request->count_of_request,
                ];


                $user = Auth::user()->whereRoleId(1)->get();

                Notification::send($user, new \App\Notifications\process($details));
                return redirect()->route('home')->with('alert', '  You will receive an email in the answer to your request or you can see the result on the website');

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
        return view('website.request.accept')->with(['volunteerrequest'=>$volunteerrequest,'event'=>$event]);


    }
    public function rejected()
    {
        $volunteerrequest = Event_volunteer::whereStatus(2)->get();
        $event=Event::select('title')->get();
        return view('website.request.rejected')->with(['volunteerrequest'=>$volunteerrequest,'event'=>$event]);


    }
    public function pending()
    {
        $volunteerrequest = Event_volunteer::whereStatus(3)->get();
        $event=Event::select('title')->get();
        return view('website.request.pending')->with(['volunteerrequest'=>$volunteerrequest,'event'=>$event]);


    }


    public function processing($vid , $eid)
    {
        $request_accept=Event_volunteer::whereVolunteerId($vid)->whereEventId($eid)->firstOrFail();
        $request_accept->status=1;
        $request_accept->cancellation_reason="";
        $request_accept->update();
        $event_name=Event::whereId($eid)->first('title')->title;



//        $volunteerrequest = Event_volunteer::get();
//        $event=Event::select('title')->get();

        $details = [
            'event' => $event_name,
            'body' => 'Your request has been approved to volunteer at the event:',
            'id' => 'accept',
            'thanks' => 'Thank you ',
        ];


        $user = User::whereId($vid)->first();


        Notification::send($user, new \App\Notifications\process($details));

        \Mail::to($user)->send(new process($details));


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
        $event_name=Event::whereId($request->eid)->first('title')->title;


        $details = [
            'event' => $event_name,
            'body' => 'Your request to volunteer for the event has been rejected:',
            'id' => 'deny',
            'thanks' => $request->Reason ,
        ];


        $user = Auth::user()->whereId($request->vid)->first();

        Notification::send($user, new \App\Notifications\process($details));

        \Mail::to($user)->send(new process($details));



        return redirect()->back()->with(['volunteerrequest'=>$volunteerrequest,'event'=>$event]);


    }


    public function searchEvent(Request $request)
    {
        if ($request->status==0) {
            $event_name=$request->search;
            $event_id=Event::select('id')->whereTitle($event_name)->firstOrFail();
            $volunteerrequest = Event_volunteer::whereEventId($event_id->id)->get();
            $event=Event::select('title')->get();

            return view('website.request.acceptingrequests',compact('event','volunteerrequest','event_name'));



        }

        elseif ($request->status==1){
        $event_name=$request->search;
        $event_id=Event::select('id')->whereTitle($event_name)->firstOrFail();
        $volunteerrequest = Event_volunteer::whereEventId($event_id->id)->whereStatus($request->status)->get();
        $event=Event::select('title')->get();
        return view('website.request.accept',compact('event','volunteerrequest','event_name'));
        }
        elseif ($request->status==2){
            $event_name=$request->search;
            $event_id=Event::select('id')->whereTitle($event_name)->firstOrFail();
            $volunteerrequest = Event_volunteer::whereEventId($event_id->id)->whereStatus($request->status)->get();
            $event=Event::select('title')->get();
            return view('website.request.rejected',compact('event','volunteerrequest','event_name'));
        }
        elseif ($request->status==3){
            $event_name=$request->search;
            $event_id=Event::select('id')->whereTitle($event_name)->firstOrFail();
            $volunteerrequest = Event_volunteer::whereEventId($event_id->id)->whereStatus($request->status)->get();
            $event=Event::select('title')->get();
            return view('website.request.pending',compact('event','volunteerrequest','event_name'));
        }




    }


    public function read_notification($notification_id){

        $notification_send=Auth::user()->unreadNotifications()->whereId($notification_id)->first()->data;


       if ($notification_send['id']=='send'){


        $event_name=$notification_send['event'];
        $event_id=Event::select('id')->whereTitle($event_name)->firstOrFail();
        $volunteerrequest = Event_volunteer::whereEventId($event_id->id)->get();
        $event=Event::select('title')->get();
        return view('website.request.acceptingrequests',compact('event','volunteerrequest','event_name'));

       }
       else{

        Auth::user()->unreadNotifications()->whereId($notification_id)->first()->markAsRead();
        return redirect()->route('request_for_help.yourRequest');
           }


    }



    public function acceptcheck(Request  $request){


        $volunteer_ids=$request->volunteer_ids;
        $volunteer_ids=explode(",",$volunteer_ids );

        $event_ids=$request->event_ids;
        $event_ids=explode(",",$event_ids );

        $i=0;
        foreach ($volunteer_ids as $volunteer_ids){


            $request_accept=Event_volunteer::whereVolunteerId($volunteer_ids)->whereEventId($event_ids[$i])->firstOrFail();
            $request_accept->status=1;
            $request_accept->cancellation_reason="";
            $request_accept->update();



            $event_name=Event::whereId($event_ids[$i])->first('title')->title;



            $details = [
                'event' => $event_name,
                'body' => 'Your request has been approved to volunteer at the event:',
                'id' => 'accept',
                'thanks' => 'Thank you ',
            ];


            $user = User::whereId($volunteer_ids)->first();


            Notification::send($user, new \App\Notifications\process($details));

            \Mail::to($user)->send(new process($details));






            $i++;

        }

        return redirect()->back();

    }



    public function denycheck(Request  $request){


        $volunteer_ids=$request->volunteer_ids;
        $volunteer_ids=explode(",",$volunteer_ids );

        $event_ids=$request->event_ids;
        $event_ids=explode(",",$event_ids );

        $i=0;
        foreach ($volunteer_ids as $volunteer_ids){


            $request_deny=Event_volunteer::whereVolunteerId($volunteer_ids)->whereEventId($event_ids[$i])->firstOrFail();
            $request_deny->status=2;
            $request_deny->cancellation_reason=$request->Reason;
            $request_deny->update();
            $event_name=Event::whereId($event_ids[$i])->first('title')->title;


            $details = [
                'event' => $event_name,
                'body' => 'Your request to volunteer for the event has been rejected:',
                'id' => 'deny',
                'thanks' => $request->Reason ,
            ];

            $user = Auth::user()->whereId($volunteer_ids)->first();

            Notification::send($user, new \App\Notifications\process($details));

            \Mail::to($user)->send(new process($details));

            $i++;
        }
        $volunteerrequest = Event_volunteer::get();
        $event=Event::select('title')->get();

        return redirect()->back()->with(['volunteerrequest'=>$volunteerrequest,'event'=>$event]);


    }

}
