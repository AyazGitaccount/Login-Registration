@extends('index')
@section('content')

<div class="row justify-content-center mt-5">
    <div class="col-md-6 ">
        <div class="card py-4 px-5">
            <div class="card-body ">
                <div class="d-flex justify-content-center">
                    <h2>SIGN UP</h2>
                </div>
                <form class="pt-3" method="POST" action="/register" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Name</label>
                        <input type="text" class="form-control" name="name" id="exampleInputEmail1" aria-describedby="emailHelp">
                        <span class="text-danger">@error('name'){{ $message }} @enderror</span>

                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Email address</label>
                        <input type="email" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp">
                        <span class="text-danger">@error('email'){{ $message }} @enderror</span>
                        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Password</label>
                        <input type="password" class="form-control" name="password" id="exampleInputPassword1">
                        <span class="text-danger">@error('password'){{ $message }} @enderror</span>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Confirm Password</label>
                        <input type="password" class="form-control" name="password_confirmation" >
                        <span class="text-danger">@error('password_confirmation'){{ $message }} @enderror</span>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Profile Picture</label>
                        <input type="file" class="form-control" name="picture" id="exampleInputPassword1">
                        <span class="text-danger">@error('picture'){{ $message }} @enderror</span>
                    </div>
                    <button type="submit" class="btn btn-primary ">Sign up </button>
                    <a class="btn btn-outline-primary  mx-2" href="/login" role="button">Login</a>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection