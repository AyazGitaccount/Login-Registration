{{View::make('header')  }}
@extends('index')
@section('content')
<section>
    <div class="container">
        <div class="row">
            @foreach($content as $data)
            <div class="col-md">
                <img class="img-fluid h-60"  src="{{asset('storage/'.$data->image)}}" alt="img">
            </div>
                <h1>{{$data->title}}</h1>
                <p>{{$data->description}}</p>
            @endforeach
        </div>
    </div>
</section>

@endsection