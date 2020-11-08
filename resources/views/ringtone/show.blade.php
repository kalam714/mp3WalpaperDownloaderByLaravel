@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card"  style="margin-top:50px;">
                <div class="card-header">{{$ringtone->title}}</div>

                <div class="card-body">
                    <audio controls  controlslist="nodownload">
                        <source src="/audio/{{$ringtone->file}}" type="audio/ogg">
                        </audio>
               
                </div>
                <div class="card-footer">
                <form action="{{route('ringtone.downlaod',[$ringtone->id])}}" method="POST">@csrf
               <button type="submit" class="btn btn-dark btn-sm">
                 Downlaod
               </button>
            </form>

            </div>
            </div>
            <table class="table mt-4">
                <tr>
                    <th>Tittle</th>
                    <td>{{$ringtone->title}}
                </tr>
                <tr>
                    <th>Category</th>
                    <td>{{$ringtone->category->name}}
                </tr>
                <tr>
                    <th>Description</th>
                    <td>{{$ringtone->description}}
                </tr>
                <tr>
                    <th>Format</th>
                    <td>{{$ringtone->format}}
                </tr>
                <tr>
                    <th>File Size</th>
                    <td>{{$ringtone->size}}
                </tr>
                <tr>
                    <th>Total Downlaods</th>
                    <td>{{$ringtone->downlaod}}
                </tr>

            </table>
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
