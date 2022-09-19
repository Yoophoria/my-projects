@extends('layouts.app')

@section('content')
    <h1>All Posts</h1>
    @if(count($posts) > 0)
        <div class="row">
            
            @foreach($posts as $post)
            <div class="col-12 col-md-6 h-100">
                <div class="card text-center mb-2">
                    <!-- <div class="card-header">Post {{$post->id}}
                        
                    </div> -->
                    
                    <div>
                        <img class="card-img-top img-thumbnail" style="width: 100%" src="/storage/cover_images/{{$post->cover_image}}" alt="">
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