@extends('main')
@section('title',"profile")
@section('content')
    <h1 class="header">Myposts({{Auth::user()->username}})</h1>
    
    @if (!empty($posts))
        <div class="container posts">
            @foreach ($posts as $post)
                <div class="outer-con" id='open'>
                    <div class="img-con">
                    <a href="posts/{{$post->id}}">
                            <img src="{{ asset("storage/images/{$post->img}") }}" alt="IMAGE"  class="img-fluid">
                        </a>
                    </div>
                    <div class="body-con">
                        {!! $post->body !!}
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
            @endforeach
        </div>

@else

    <div class="alert alert-info">there is no posts</div>

@endif




@endsection