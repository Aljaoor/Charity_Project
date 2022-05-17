<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Event_volunteer;
use Illuminate\Http\Request;

class EventVolunteerController extends Controller
{
    public function volunteering ($id){
        $co=Event::whereId($id)->first();
        $count_of_volunteers=$co->count_of_volunteers;
        $counter=Event_volunteer::whereEventId($id)->count();





//$d=Event_volunteer::whereEventId($id)->first();
//if($d!=null){}
//$ds=$d->volunteer_id;
//            if($ds!=$id){

        if (auth()->user()->role_id==3){



            if( $counter<$count_of_volunteers){
        $eventvolunteer = new Event_volunteer();
        $eventvolunteer->event_id = $id;
        $eventvolunteer->volunteer_id = auth()->user()->id;
        $eventvolunteer->status = 3;
        $eventvolunteer->save();
        return redirect()->route('home')->with('alert','welcome to our Event');

            }
        else{
            return redirect()->route('home')->with('volunteering','Sorry,we have enough number of volunteers');


        }}
//            }
//            else{                return redirect()->route('home')->with('volunteering','you join to this event  ');
//            }

else{
    return redirect()->route('home')->with('volunteering','please sign in as a volunteer and try again  ');

}






    }

public  function view(){
    $volunteerrequest =Event_volunteer::get();

    return view('website.request.acceptingrequests')->with('volunteerrequest',$volunteerrequest);


}


}
