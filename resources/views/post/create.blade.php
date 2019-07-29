@extends('layouts.app')
@section('content')
    
    <div class="content my-4">
        <h3>Create Post</h3>
        <div class="row">
            <form action="{{ action('PostsController@store') }}" method="post">
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" name="title" id="title" class="form-control" placeholder="Title">
                </div>

                
                <div class="form-group">
                    <label for="article-ckeditor">Body</label>
                    <textarea class="form-control" name="body" id="article-ckeditor" rows="3" placeholder="Body"></textarea>
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
                {{ csrf_field() }}
                
            </form>
        </div>
          
        
    </div> 
@endsection