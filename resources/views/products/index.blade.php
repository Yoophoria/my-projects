@extends('layouts.app')

@section('content')
    <h1>Products</h1>
    <div class="row">
        <div class="col-sm-2">
            
            @if(session('cart'))
                <a href="{{ url('cart') }}" class="btn btn-primary  mt-3 mb-3 btn-block">

                    <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                     Cart
                    <!-- this code count product of choose tha user choose -->

                    <span class="badge badge-pill badge-danger">{{ count(session('cart')) }}</span>
                </a>
        </div>

        <div class="col-sm-4 text-center">
     
                @if(session('success'))
                    <p class="btn-success  mt-3 mb-3 btn-block session" style='padding: .375rem .75rem;'>
                      {{ session('success') }}
                    </p>
                @endif
                
                @else
                    <a href="" class="btn text-light bg-warning mt-3 mb-3" role="button">
                    <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                    Cart Empty
                    </a> 

                @endif
        </div>
    </div>

    @if(count($products) > 0)
    <div class="row row-cols-1 row-cols-md-4 g-4">
        @foreach($products as $product)
        <div class="col">
            <div class="card h-100">
            <svg class="bd-placeholder-img card-img-top" width="100%" height="140" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Image cap" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#868e96"></rect><text x="50%" y="50%" fill="#dee2e6" dy=".3em">Image cap</text></svg>
        
            <div class="card-body">
                <h5 class="card-title">{{$product->name}}</h5>
                <p class="card-text">Price: RM{{$product->price}}</p>
                <p class="card-text">Stock: {{$product->stock}}</p>
                <a href="{{url('add-to-cart/'.$product->id)}}" class="btn btn-primary">Add to cart</a>
            </div>
            </div>
        </div>
        @endforeach
    </div>
    @else

    @endif

@endsection
