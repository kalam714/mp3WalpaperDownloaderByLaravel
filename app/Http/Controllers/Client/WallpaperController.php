<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Image;

class WallpaperController extends Controller
{
   public function wallpapers(){
       $images=Image::all();
       return view('image.index',compact('images'));

   }
   public function download($id){
       $image=Image::find($id);
       $imageName=$image->file;
       $filePath=public_path('uploads/').$imageName;
       return \Response::download($filePath);
   }
   public function download1($id){
    $image=Image::find($id);
    $imageName=$image->file;
    $filePath=public_path('uploads/1024/').$imageName;
    return \Response::download($filePath);
}
public function download2($id){
    $image=Image::find($id);
    $imageName=$image->file;
    $filePath=public_path('uploads/480/').$imageName;
    return \Response::download($filePath);
}
public function download3($id){
    $image=Image::find($id);
    $imageName=$image->file;
    $filePath=public_path('uploads/240/').$imageName;
    return \Response::download($filePath);
}


}
