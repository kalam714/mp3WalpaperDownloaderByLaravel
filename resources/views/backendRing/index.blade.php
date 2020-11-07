@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">All Ringtones
                <span class="float-right">
                <a href="{{route('ringtones.create')}}" >
                <button class="btn btn-info">Upload Ringtone
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
      <th scope="col">Ringtone</th>
      <th scope="col">Category</th>

      <th scope="col">Format</th>
      <th scope="col">Download</th>
      <th scope="col">Edit</th>
      <th scope="col">Edit</th>
    </tr>
  </thead>
  <tbody>
  @foreach($ringtones as $key=>$ringtone)
    <tr>
       <td>{{$key+1}}</td>
      <td >{{$ringtone->title}}</td>
      <td>
      <audio controls onplay="pauseOthers(this);">
      <source src="/audio/{{$ringtone->file}}" type="audio/ogg">
      </audio>
      
      </td>
      <td>{{$ringtone->category->name}}</td>
      <td>{{$ringtone->format}}</td>
      <td></td>
      <td>
      <a href="{{route('ringtones.edit',[$ringtone->id])}}" >
                <button class="btn btn-info">Edit
                </button>
     </a> 
  

      </td>
      <td>
      <form action="{{route('ringtones.destroy',[$ringtone->id])}}" method="post"
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
<script>
    function pauseOthers(element){
        $('audio').not(element).each(function(index,audio){
            audio.pause()
        })
    }
</script>
@endsection
