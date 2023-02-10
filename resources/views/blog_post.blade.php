{{View::make('header')  }}
@extends('index')
@section('content')
<div class="row justify-content-center my-5">
    <div class="col-md-6 ">
        <div class="card py-4 px-5">
            <div class="card-body ">
                <div class="d-flex justify-content-center">
                    <h2>Create Blog</h2>
                </div>
                <form method="POST" action="/blog_post" class="pt-3" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Title</label>
                        <input type="text" name="title" class="form-control"  id="exampleInputEmail1" aria-describedby="emailHelp">
                        <span class="text-danger">@error('title'){{ $message }} @enderror</span>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Description</label>
                        <input type="text" name="description" class="form-control"  id="exampleInputEmail1" aria-describedby="emailHelp">
                        <span class="text-danger">@error('description'){{ $message }} @enderror</span>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Picture</label>
                        <input type="file" name="picture" class="form-control"  id="exampleInputPassword1">
                        <span class="text-danger">@error('picture'){{ $message }} @enderror</span>
                    </div>
                    <button type="submit" class="btn btn-primary">Post</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection