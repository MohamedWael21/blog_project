@extends('main')
@section('title','update')
@section('content')
<h1 class="header">Add posts</h1>
<div class="container add-posts">
    <form action="{{ route('update',"$post->id") }}" method="POST" enctype="multipart/form-data">
         @csrf
        <textarea name="body" id="ck">{!!$post->body !!}</textarea>
        <div class="inner-con">
             <label for="img" class='btn btn-primary'>Choose Img</label>
            <input type="file" name="image" id="img" value="{{$post->img}}">
             <input type="submit" value="update" class='btn btn-success'>
        </div>
        <input type="hidden" name="userId" value='{{Auth::user()->id}}'>
    </form>
    @if (Session::has('message'))
            <div class="success alert alert-success">
                {{Session::get('message')}}
            </div>
    @endif
</div>    
@endsection
