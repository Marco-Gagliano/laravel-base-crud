@extends('layouts.main')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-5 mb-4">
                <img class="w-50" src="{{$comic->image}}" alt="{{$comic->name}}">

            </div>
            <div class="col-7">
                <h3>{{$comic->title}}</h3>
                <p>{{$comic->type}}</p>
            </div>
            <div class="col-6">
                <a class="btn btn-danger" href="{{route('comics.index')}}">BACK</a>
            </div>
        </div>
    </div>

@endsection
