@extends('products.main')

@section('main-container')
    @include('products.message')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-10 mt-4">
                <div class="card p-4">
                    <p>Name:- <b class="">{{ $product->name }}</b></p>
                    <p>Description:- <b>{{ $product->description }}</b></p>
                    <img src="{{ asset('storage/app/products/' . $product->image) }}" alt="" class="rounded"
                        width="60%" height="60%">
                </div>
            </div>
        </div>
    </div>
@endsection
