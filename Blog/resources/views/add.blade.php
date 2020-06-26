@extends('main')
@section('title','Add')
@section('content')
   <h1 class="header">Add posts</h1>
   <div class="container add-posts">
       <form action="{{ route('add') }}" method="POST" enctype="multipart/form-data">
            @csrf
           <textarea name="body" id="ck"></textarea>
           <div class="inner-con">
                <label for="img" class='btn btn-primary'>Choose Img</label>
                <input type="file" name="image" id="img">
                <input type="submit" value="Add" class='btn btn-success'>
           </div>
           <input type="hidden" name="userId" value='{{Auth::user()->id}}'>
       </form>
       @if (Session::has('message'))
            <div class="success alert alert-success">
                {{Session::get('message')}}
            </div>
       @endif
       @if ($errors)

            @foreach ($errors->all() as $error)
                <div class="err alert alert-danger">{{$error}}</div>                
            @endforeach
           
       @endif
   </div>
@endsection
