@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if(count($ringtones)> 0)
            @foreach ($ringtones as $ringtone)
                
           
            <div class="card" style="margin-top:50px;">
                <div class="card-header">{{ $ringtone->title }}</div>

                <div class="card-body">
                    <audio controls onplay="pauseOthers(this);" controlslist="nodownload">
                        <source src="/audio/{{$ringtone->file}}" type="audio/ogg">
                        </audio>
               
                </div>
                <div class="card-footer">
                <a href="{{route('ringtone.show',[$ringtone->id,$ringtone->slug])}}">
                        Info and Download

                    </a>

                </div>
            </div>
            @endforeach
            @else
            <p>there is no ringtone </p>
            @endif
        </div>
        <div class="col-md-4" style="margin-top:50px;">
            <div class="card-header">Categories</div>
            @foreach (App\Models\Category::all() as $category)
            <div class="card-header" style="background-color: #ccc">
            <a href="{{route('ringtone.category',[$category->id])}}">{{$category->name}}</a>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
