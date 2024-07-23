@extends('products.main')

@section('main-container')
    @include('products.message')

    <div class="container mt-5">
        <a href="{{ route('index') }}"><button class="btn btn-dark float-right mb-1">Back</button></a>
        <div class="d-flex justify-content-center">
            <h3 class="text-muted">Product Edit #{{ $products->name }}</h3>
        </div>
        <form action="{{ url($products->id . '/update') }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="card p-3 m-2">
                <div class="mb-3">
                    <label for="name" class="form-label"><b>Name:</b></label>
                    <input type="text" class="form-control" id="name" name="name"
                        value="{{ old('name', $products->name) }}">
                    @if ($errors->has('name'))
                        <span class="text-danger">{{ $errors->first('name') }}</span>
                    @endif
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label"><b>Email:</b></label>
                    <input type="email" class="form-control" id="email" name="email"
                        value="{{ old('email', $products->email) }}" readonly>
                    @if ($errors->has('email'))
                        <span class="text-danger">{{ $errors->first('email') }}</span>
                    @endif
                </div>


                <div class="mb-3">
                    <label for="image" class="form-label"><b>Upload Image:</b></label>
                    <input type="file" class="form-control" id="image" name="image" accept="image/*">
                    @if ($errors->has('image'))
                        <span class="text-danger">{{ $errors->first('image') }}</span>
                    @endif
                </div>

                <div class="text-center">
                    <button type="submit" class="btn btn-dark">Update</button>
                </div>
            </div>
        </form>
    </div>
@endsection
