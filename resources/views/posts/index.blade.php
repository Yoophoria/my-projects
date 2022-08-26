@extends('layouts.app')

@section('content')
    <h1>Post One</h1>
        @if(count($posts) > 1)
            <div class="row">
                
                @foreach($posts as $post)
                <div class="col-12 col-md-6">
                    <div class="card text-center mb-2">
                        <div class="card-header">Post {{$post->id}}
                            
                        </div>
                        <div class="card-body">
                            <h3>{{$post->title}}</h3>
                            <p class="card-text">{{$post->body}}</p>
                            <a href="/posts/{{$post->id}}" class="btn btn-primary">View Post</a>
                        </div>
                        <div class="card-footer text-muted">
                            Written on {{$post->created_at}}
                        </div>
                    </div>
                </div>
                @endforeach
                        
            </div>
        @else

        @endif
@endsection