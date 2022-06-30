
@extends('layouts.main')

@section('content')


    <div class="container">

        <h1>DC Comics</h1>

        <table class="table">

            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Titolo</th>
                <th scope="col">Tipologia</th>
                <th scope="col">Azioni</th>
            </tr>
            </thead>

            @foreach ($comics as $comic)
            <tbody>
            <tr>
                <th scope="row">{{$comic->id}}</th>
                <td>{{$comic->title}}</td>
                <td>{{$comic->type}}</td>
                <td>
                    <a class="btn btn-success" href="{{route('comics.show', $comic)}}">DETTAGLI</a>
                    <a class="btn btn-primary" href="{{route('comics.edit', $comic)}}">MODIFICA</a>
                    <form class="d-inline"
                        action="{{route('comics.destroy', $comic)}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">CANCELLA</button>
                    </form>

                </td>
            </tr>

            </tbody>
            @endforeach
        </table>

    </div>

    @endsection


