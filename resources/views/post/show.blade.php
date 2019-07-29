@extends('layouts.app')
@section('content')
    
    <div class="content my-4">
        <a href="/posts" class="btn btn-success">Go Back</a>

        <h3>{{$post->title}}</h3>
        
        <div>
            {!!$post->body!!} <!-- To make it parse HTML from ckeditor -->
        </div>
        <small>Written on {{$post->created_at}} by {{ $post->user->name}}</small>
        <hr>
        @if(!Auth::guest())
            @if(Auth::user()->id == $post->user_id)
                <a href="/posts/{{$post->id}}/edit" class="btn btn-warning outline-success pull-left">Edit</a>
                <form action="{{ action('PostsController@destroy', $post->id) }}" method="post">
                    {{ csrf_field() }}
                    <input type="hidden" name="_method" value="DELETE">
                    <button class="btn btn-danger pull-right">Delete</button> <!-- the button must not have input type -->
                </form>
            @endif
        @endif
    </div>
@endsection