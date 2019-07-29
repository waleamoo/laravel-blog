@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    <a href="/posts/create" class="btn btn-primary">Create Post</a>

                    <h3>Your blog posts</h3>
                    @if(count($posts) > 0)
                        <table class="table table-responsive">
                            <tr>
                                <th>
                                    Title
                                </th>
                                <th>
                                    &nbsp;
                                </th>
                                <th>
                                    &nbsp;
                                </th>
                            </tr>
                            @foreach ($posts as $post)
                                <tr>
                                    <td>{{ $post->title }}</td>
                                    <td><a href="/posts/{{$post->id}}" class="btn btn-warning">Edit</a></td>
                                    <td>
                                        <form action="{{ action('PostsController@destroy', $post->id) }}" method="post">
                                            {{ csrf_field() }}
                                            <input type="hidden" name="_method" value="DELETE">
                                            <button class="btn btn-danger pull-right">Delete</button> <!-- the button must not have input type -->
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    @else
                        <p class="text-danger">You have no post.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
