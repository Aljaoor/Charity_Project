<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Office;
use App\Models\Requestt;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use File;
use Illuminate\Support\Facades\Auth;
use App\Models\User;


class RequesttController extends Controller
{
    public function add(){

            $offices=Office::get();
            return view('website.request.add')->with('offices',$offices);

    }
    public function create(Request $request){
        $req= new Requestt();
        $req->family_count = $request->family_count;
        $req->office_id = $request->office_id;
        $req->proof_image = $request->file('proof_image')->getClientOriginalName();
        $req->cancellation_reason = $request->cancellation_reason;
        $req->member_id=auth()->user()->id;
        $req->save();
        return redirect()->route('home')->with('alert','Your request has been sent and you will be contacted as soon as possible.  ');

    }



}
