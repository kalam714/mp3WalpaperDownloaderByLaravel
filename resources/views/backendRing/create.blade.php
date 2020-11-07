@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Ringtone Uplaod
                <span class="float-right">
                <a href="{{route('ringtones.index')}}" >
                <button class="btn btn-info">Show Ringtone
                </button>
                </a>
                </span>
                </div>
               

                <div class="card-body">
                  
<form action="{{route('ringtones.store')}}" method="post" enctype="multipart/form-data">
@csrf
  <div class="form-group">
    <label for="exampleFormControlInput1">Title</label>
    <input type="text" class="form-control" name="title">
  </div>
  <div class="form-group">
    <label for="exampleFormControlSelect1">Category</label>
    <select class="form-control" name="category">
    <option>Select</option>
    @foreach($categories as $category)
      <option value="{{$category->id}}">{{$category->name}}</option>
      @endforeach
    
    </select>
  </div>

  <div class="form-group">
    <label for="exampleFormControlTextarea1">Description</label>
    <textarea class="form-control" name="description" rows="2"></textarea>
  </div>
  <div class="form-group">
    <label for="exampleFormControlFile1">Select Audio</label>
    <input type="file" class="form-control-file" name="file" accept="audio/*">
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
