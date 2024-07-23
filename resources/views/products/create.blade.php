@extends('products.main')

@section('main-container')
    @include('products.message')

    <div class="container mt-5">
        <a href="{{ route('dashboard') }}"><button class="btn btn-dark float-right mb-1">Back</button></a>
        <div class="d-flex justify-content-center">
            <h3 class="text-muted">Add New User</h3>
        </div>
        <form action="{{ route('user.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="card p-3 m-2">
                <div class="mb-3">
                    <label for="name" class="form-label"><b>Name:</b></label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}">
                    @if ($errors->has('name'))
                        <span class="text-danger">{{ $errors->first('name') }}</span>
                    @endif

                </div>

                <div class="mb-3">
                    <label for="email" class="form-label"><b>Email:</b></label>
                    <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}">
                    @if ($errors->has('email'))
                        <span class="text-danger">{{ $errors->first('email') }}</span>
                    @endif
                </div>


                <div class="mb-3">
                    <label for="message" class="form-label"><b>Password:</b></label>
                    <input type="password" class="form-control" name="password" id="password"
                        placeholder="Password">
                    @if ($errors->has('password'))
                        <span class="text-danger">{{ $errors->first('password') }}</span>
                    @endif
                </div>

                <div class="mb-3">
                    <label for="message" class="form-label"><b>Confirm Password:</b></label>
                    <input type="password" class="form-control" name="confirm_password"
                        id="confirm_password" placeholder="Confirm Password">
                    @if ($errors->has('confirm_password'))
                        <span class="text-danger">{{ $errors->first('confirm_password') }}</span>
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
                    <button type="submit" class="btn btn-dark">Submit</button>
                </div>

            </div>

        </form>
    </div>
@endsection
