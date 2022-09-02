@extends('layouts.app')

@section('content')
    <h1>{{$title}}</h1>
    <p>This is a page for the new project that was created on 24th August.</p>

    <!-- <div class="d-grid gap-2 col-6 mx-auto">
        
    </div> -->

    <a class="btn btn-dark" href="{{ url('posts/create') }}">Add Post</a>

    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
    Modal
    </button>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Felis Catus</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            The cat is a domestic species of small carnivorous mammal. 
            It is the only domesticated species in the family Felidae 
            and is often referred to as the domestic cat to distinguish it 
            from the wild members of the family.
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Understood</button>
        </div>
        </div>
    </div>
    </div>
@endsection