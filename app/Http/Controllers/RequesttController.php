<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Requestt;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use File;
use Illuminate\Support\Facades\Auth;
use App\Models\User;


class RequesttController extends Controller
{
    public function add(){

            $offices=Event::get();
            return view('website.request.add')->with('offices',$offices);

    }
    public function create(Request $request){

        $request= new  Requestt();
        $request->family_count = $request->family_count;
        $request->office_id = $request->office_id;
        $request->proof_image = $request->file('proof_image');
//        $request->proof_image = $request->file('proof_image')->getClientOriginalName();
        $request->cancellation_reason = $request->cancellation_reason;
        $request->member_id=auth()->user()->id;
//        $request->save();
        dd($request);

    }

}
