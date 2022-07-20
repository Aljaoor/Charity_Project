<?php

namespace App\Http\Controllers;

use App\Models\request_proof;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
class RequestProofController extends Controller
{

    public function show($file_name, $request_id){

        $files = Storage::disk('public_proof')->getDriver()->getAdapter()->applyPathPrefix($request_id.'/'.$file_name);
        return response()->file($files);

    }

    public  function  download($file_name, $request_id){

        $contents= Storage::disk('public_proof')->getDriver()->getAdapter()->applyPathPrefix($request_id.'/'.$file_name);
        return response()->download( $contents);

    }

    public  function  delete($file_name, $request_id){

        request_proof::whereRequestId($request_id)->whereImageName($file_name)->first()->delete();
        Storage::disk('public_proof')->delete($request_id.'/'.$file_name);
        return back();
    }

}
