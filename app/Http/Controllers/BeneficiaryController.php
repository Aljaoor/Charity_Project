<?php

namespace App\Http\Controllers;

use App\Mail\request_help;
use App\Models\Beneficiary;
use App\Models\request_for_help;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Notification;
use App\Models\User;

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



        $details = [
            'type' => $beneficiary->help,
            'body' => 'Your request has been accepted and you will receive',
            'id' => 'accept_help',
            'thanks' => 'Thank you ',
        ];


        $user = User::whereId($request_accept->member_id)->first();


        Notification::send($user, new \App\Notifications\request_help($details));

        \Mail::to($user)->send(new request_help($details));

        //        whats app message        ===================
        $user=User::find($request_accept->member_id);
        $name_user=$user->name;
        $mobile=$user->mobile;


        $message="hello $name_user
'Your request has been accepted and you will receive:
$beneficiary->help
thank you
Bright Of Hope";




        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.ultramsg.com/instance13013/messages/chat",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_SSL_VERIFYHOST => 0,
            CURLOPT_SSL_VERIFYPEER => 0,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => "token=7gptlblt2p3ihi56&to=$mobile&body=$message&priority=10&referenceId=",
            CURLOPT_HTTPHEADER => array(
                "content-type: application/x-www-form-urlencoded"
            ),
        ));

        curl_exec($curl);
//        whats app message        ===================


        return redirect()->back();

    }


}
