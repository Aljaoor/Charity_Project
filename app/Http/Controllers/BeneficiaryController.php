<?php

namespace App\Http\Controllers;

use App\Models\Beneficiary;
use App\Models\request_for_help;
use Illuminate\Http\Request;

class BeneficiaryController extends Controller
{

    public function accept(Request $request)
    {


        $request_accept=request_for_help::whereId($request->request_id)->firstOrFail();
        $request_accept->status=1;
        $request_accept->cancellation_reason="";
        $request_accept->request_verified_at=now();

        $request_accept->update();



        $beneficiary= new Beneficiary();
        $beneficiary->member_id=$request_accept->member_id;
        $beneficiary->office_id=$request_accept->office_id;
        $beneficiary->help="Type of help $request->type  worth  $request->sum";
        $beneficiary->save();



//        $event_name=Event::whereId($eid)->first('title')->title;



//        $volunteerrequest = Event_volunteer::get();
//        $event=Event::select('title')->get();

//        $details = [
//            'event' => $event_name,
//            'body' => 'Your request has been approved to the event:',
//            'id' => 'accept',
//            'thanks' => 'Thank you ',
//        ];
//
//
//        $user = User::whereId($vid)->first();
//
//
//        Notification::send($user, new \App\Notifications\process($details));
//
//        \Mail::to($user)->send(new process($details));


        return redirect()->back();

    }


}
