<?php

namespace App\Http\Controllers;
use App\Models\Event_attachment;
use Illuminate\Support\Facades\Storage;
use App\Models\Event;
use File;
use Illuminate\Http\Request;

class EventAttachmentController extends Controller
{
public  function  delete($id){

   $image=Event_attachment::whereEventId($id)->first();
    Storage::disk('public_uploads')->delete($image->event_id.'/'.$image->file_name);
    $image->delete();
    session()->flash('delete_image', 'تم حذف المرفق بنجاح');
    return back();
}
    public  function  download($id){

        $image=Event_attachment::whereEventId($id)->first();
        $contents= Storage::disk('public_uploads')->getDriver()->getAdapter()->applyPathPrefix($image->event_id.'/'.$image->file_name);
        return response()->download( $contents);

    }

public  function show($id){
    $file_name= Event_attachment::whereEventId($id)->first();
    $image=$file_name->file_name;
    $files = Storage::disk('public_uploads')->getDriver()->getAdapter()->applyPathPrefix($id.'/'.$image);
    return response()->file($files);

}


}
