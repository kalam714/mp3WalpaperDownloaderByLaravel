@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        @foreach ($images as $image)
            
        
        <div class="col-md-8 mt-4">
            <div class="card">
                <div class="card-header">{{$image->title}}</div>

                <div class="card-body">
                   
                   <p>
                   <img src="/uploads/{{$image->file}}" class="img-thumbnail">
                   </p>
                   <p>{{$image->description}}</p>
                </div>
            </div>
        </div>
        <div class="col-md-3 mt-4">
        <form action="{{route('download',[$image->id])}}" method="post">@csrf
            <button class="btn btn-success">Download</button>
            </form>
            <br>
            <form action="{{route('download1',[$image->id])}}" method="post">@csrf
                <button class="btn btn-success">Download 1024</button>
                </form>
                <br>
                <form action="{{route('download2',[$image->id])}}" method="post">@csrf
                    <button class="btn btn-success">Download 480</button>
                    </form>
                    <br>
                    <form action="{{route('download3',[$image->id])}}" method="post">@csrf
                        <button class="btn btn-success">Download 240</button>
                        </form>
                        <br>

        </div>
        @endforeach
    </div>
</div>
@endsection
