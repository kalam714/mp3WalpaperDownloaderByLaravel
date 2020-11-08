@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Upload Wallpaper
                <span class="float-right">
                <a href="{{route('images.index')}}" >
                <button class="btn btn-info">Show Wallpaper
                </button>
                </a>
                </span>
                </div>
               

                <div class="card-body">
                  
<form action="{{route('images.store')}}" method="post" enctype="multipart/form-data">
@csrf
  <div class="form-group">
    <label for="exampleFormControlInput1">Title</label>
    <input type="text" class="form-control" name="title">
  </div>
 

  <div class="form-group">
    <label for="exampleFormControlTextarea1">Description</label>
    <textarea class="form-control" name="description" rows="2"></textarea>
  </div>
  <div class="form-group">
    <label for="exampleFormControlFile1">Select wallpaper</label>
    <input type="file" class="form-control-file" name="image" >
  </div>
  <div class="form-group">
    
    <button type="submit" class="btn btn-primary">Uplaod</button>
  </div>
</form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
