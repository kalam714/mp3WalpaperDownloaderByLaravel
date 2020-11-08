<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Image;
use Intervention\Image\ImageManagerStatic as Photo;



class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $images=Image::all();
       return view('wallpaper.index',compact('images'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('wallpaper.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate=$request->validate([
            'title'=>'required',
            'image'=>'required'
        ]);
        $image=$request->file('image');
        $fileName=$image->hashName();
        $format=$request->image->getClientOriginalExtension();
        $size=$request->image->getSize();
        $path='uploads/'.$fileName;
        $path1='uploads/1024/'.$fileName;
        $path2='uploads/480/'.$fileName;
        $path3='uploads/240/'.$fileName;
        Photo::make($image->getRealPath())->resize(800,600)->save($path);
        Photo::make($image->getRealPath())->resize(1280,1024)->save($path1);
        Photo::make($image->getRealPath())->resize(316,255)->save($path2);
        Photo::make($image->getRealPath())->resize(118,95)->save($path3);
        $wallpaper=new Image;
        $wallpaper->title=$request->title;
        $wallpaper->description=$request->description;
        $wallpaper->file=$fileName;
        $wallpaper->format=$format;
        $wallpaper->size=$size;
        $wallpaper->save();

    return redirect('/images')->with('msg',"wallpapaer save successfully");

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $image=Image::find($id);
        return view('wallpaper.edit',compact('image'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validate=$request->validate([
            'title'=>'required',
            'image'=>'required'
        ]);
        $image=Image::find($id);
        $fileName=$image->file;
        $format=$image->format;
        $size=$image->size;
        if($request->hasFile('file')){
        $image=$request->file('file');
    
        $newfileName=$image->hashName();
        $format=$request->image->getClientOriginalExtension();
        $size=$request->image->getSize();
        $path='uploads/'.$newfileName;
        $path1='uploads/1024/'.$newfileName;
        $path2='uploads/480/'.$newfileName;
        $path3='uploads/240/'.$newfileName;
        Photo::make($image->getRealPath())->resize(800,600)->save($path);
        Photo::make($image->getRealPath())->resize(1280,1024)->save($path1);
        Photo::make($image->getRealPath())->resize(316,255)->save($path2);
        Photo::make($image->getRealPath())->resize(118,95)->save($path3);

        unlink(public_path('/uploads/'.$image->file));
        unlink(public_path('/uploads/1024/'.$image->file));
        unlink(public_path('/uploads/480/'.$image->file));
        unlink(public_path('/uploads/240/'.$image->file));

        $image->title=$request->get('title');
        $image->description=$request->get('description');
        $image->format=$format;
        $image->size=$size;
        $image->file=$newfileName;
        $image->update();
        return redirect('/images')->with('msg',"ringimsave successfully");

        }else{
            
            $image->title=$request->get('title');
            $image->description=$request->get('description');
            $image->format=$format;
            $image->size=$size;
            $image->file=$fileName;
            $image->update();
            return redirect('/images')->with('msg',"image udated  successfully");
        }
  

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $image=Image::find($id);
        $image->delete();
        unlink(public_path('/uploads/'.$image->file));
        unlink(public_path('/uploads/1024/'.$image->file));
        unlink(public_path('/uploads/480/'.$image->file));
        unlink(public_path('/uploads/240/'.$image->file));
        return redirect()->back();
    }
}
