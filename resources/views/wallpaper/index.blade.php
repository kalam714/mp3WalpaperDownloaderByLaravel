@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">All Images
                <span class="float-right">
                <a href="{{route('images.create')}}" >
                <button class="btn btn-info">Upload Wallpaper
                </button>
                </a>
                </span>
                </div>
                @if(Session::has('msg'))
                {{Session::get('msg')}}
                @endif

                <div class="card-body">
                <table class="table table-dark">
  <thead>
    <tr>
    <th scope="col">Order</th>
      <th scope="col">Title</th>
      <th scope="col">image</th>
      <th scope="col">Description</th>
      
 

      <th scope="col">Format</th>
   
      <th scope="col">Edit</th>
      <th scope="col">Delete</th>
    </tr>
  </thead>
  <tbody>
  @foreach($images as $key=>$image)
    <tr>
       <td>{{$key+1}}</td>
      <td >{{$image->title}}</td>
      <td>
      <img src="/uploads/{{$image->file}}" width="50px" height="50px">
      </td>
    <td>{{$image->description}}</td>
    
      <td>{{$image->format}}</td>
      
      <td>
      <a href="{{route('images.edit',[$image->id])}}" >
                <button class="btn btn-info">Edit
                </button>
     </a> 
  

      </td>
      <td>
      <form action="{{route('images.destroy',[$image->id])}}" method="post"
      onSubmit="return confirm('Do You Want To Delete?')">@csrf
      {{method_field('DELETE')}} 

      <button class="btn btn-danger">Delete</button>
      </form>
      </td>
    </tr>
  @endforeach
  </tbody>
</table>
                   
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
