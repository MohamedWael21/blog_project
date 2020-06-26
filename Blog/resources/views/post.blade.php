@extends('main')
@section('title','post')
@section('content')

    <div class="container post">
        <div class="img-con">
            <img src="{{ asset("storage/images/{$post->img}") }}" alt="IMAGE"  class="img-fluid">
        </div>
        <div class="body">
            {!!$post->body!!}
        </div>
        @if (Auth::user()->id == $post->user_id)
            <div class="btn-con">
                <div class="btn-update">
                <a href="/update/{{$post->id}}" class="btn btn-success">Update</a>
                </div>
                <div class="btn-dele">
                <form action="/delete/{{$post->id}}" method="POST">
                        @csrf
                        <input type="submit" value="Delete" class="btn btn-danger">
                    </form>
                </div>
             </div>
         @endif
    </div>

@endsection