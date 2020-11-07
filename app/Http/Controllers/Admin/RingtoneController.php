<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Category;
use App\Models\Ringtone;

class RingtoneController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ringtones=Ringtone::all();
        return view('backendRing.index',compact('ringtones'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $categories=Category::all();
        return view('backendRing.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validateData=$request->validate([
            'title'=>'required',
            'description'=>'required',
            'file'=>'required',
        ]);

        $fileName=$request->file->hashName();
        $format=$request->file->getClientOriginalExtension();
        $size=$request->file->getSize();
        $request->file->move(public_path('audio'),$fileName);
        $tone=new Ringtone;
        $tone->title=$request->get('title');
        $tone->slug=Str::slug($request->get('title'));
        $tone->description=$request->get('description');
        $tone->category_id=$request->get('category');
        $tone->format=$format;
        $tone->size=$size;
        $tone->file=$fileName;
        $tone->save();
        return redirect('/ringtones')->with('msg',"ringtone save successfully");

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
        $ringtone=Ringtone::find($id);
        return view('backendRing.edit',compact('ringtone'));

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
        $validateData=$request->validate([
            'title'=>'required',
            'description'=>'required',
            'file'=>'required',
        ]);

        $tone=Ringtone::find($id);
        $fileName=$tone->file;
        $format=$tone->format;
        $size=$tone->size;
        $download=$tone->download;
        if($request->hasFile('file')){
        $fileName=$request->file->hashName();
        $format=$request->file->getClientOriginalExtension();
        $size=$request->file->getSize();
        $request->file->move(public_path('audio'),$fileName);
        unlink(public_path('/audio/'.$tone->file));
        $download=0;

        }
        $tone->title=$request->get('title');
        $tone->slug=Str::slug($request->get('title'));
        $tone->description=$request->get('description');
        $tone->category_id=$request->get('category');
        $tone->format=$format;
        $tone->size=$size;
        $tone->file=$fileName;
        $tone->download=$download;
        $tone->update();
        return redirect('/ringtones')->with('msg',"ringtone update successfully");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tone=Ringtone::find($id);
        unlink(public_path('/audio/'.$tone->file));
        $tone->delete();
        return redirect('/ringtones')->with('msg',"ringtone delete successfully");
    }
}
