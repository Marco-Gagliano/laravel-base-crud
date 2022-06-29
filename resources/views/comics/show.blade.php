@extends('layouts.main')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-3 mb-4">
                <img src="{{$comic->image}}" alt="{{$comic->name}}">

            </div>
            <div class="col-9">
                <h3>{{$comic->title}}</h3>
                <p>{{$comic->type}}</p>
            </div>
            <div class="col-6">
                <a class="btn btn-danger" href="{{route('comics.index')}}">BACK</a>
            </div>
        </div>
    </div>

@endsection
