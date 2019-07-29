@extends('layouts.app')
@section('content')

    <div class="content my-4">
        <h3>All Posts</h3>
        @if(count($posts) > 0)
            @foreach($posts as $post)
                <div class="well">
                    <h3><a href="/posts/{{$post->id}}">{{$post->title}}</a></h3>
                    <small>
                        Written in {{$post->created_at}} by {{ $post->user->name}}
                    </small>
                </div>
            @endforeach
        @else
            <h3>No post found</h3>
        @endif
    </div>
@endsection