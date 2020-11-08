<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Ringtone;

class ClientController extends Controller
{
    public function index(){
        $ringtones=Ringtone::all();
        return view('ringtone.index',compact('ringtones'));
    }
    public function show($id,$slug){
        
        $ringtone=Ringtone::where('id',$id)->where('slug',$slug)->first();
        return view('ringtone.show',compact('ringtone'));

    }
    public function downlaod($id){
        $ringtone=Ringtone::find($id);
        $ringtonePath=$ringtone->file;
        $filePath=public_path('audio/').$ringtonePath;
        $ringtone->increment('download');
        $ringtone->save();
        return \Response::download($filePath);
    }
    public function ringtoneByCategory($id){
        $ringtones=Ringtone::where('category_id',$id)->get();
        return view('ringtone.category',compact('ringtones'));
    }

}
