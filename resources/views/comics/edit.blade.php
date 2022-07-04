@extends('layouts.main');


@section('content')
    <div class="container my-5">
        <div class="row">
            <div class="col-6 offset-3">

                <h2 class="mb-4">Esegui la modifica di: {{$comic->name}}</h2>

                <form action="{{ route('comics.update', $comic) }}" method="POST">
                    {{-- @csrf deve essere inserito in tutti i form. se questo non viene inserito, il form non risulta valido--}}
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="name" class="form-label fw-bold">Titolo</label>
                        {{-- il name dell'input deve risultare al nome della colonna della tabella di riferimento --}}
                        <input value="{{old("title", $comic->title)}}"
                        type="text"
                        id="title"
                        name="title"
                        class="form-control @error('title') is-invalid @enderror"
                        placeholder="Inserisci il titolo del comic">
                        @error('title')
                            <p class="error-msg fw-bold">{{$message}}</p>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="image" class="form-label fw-bold">Tipo</label>
                        <input value="{{old("type", $comic->type)}}"
                        type="text"
                        id="type"
                        name="type"
                        class="form-control @error('type') is-invalid @enderror"
                        placeholder="Inserisci la tipologia del comic (es. graphic novel)">
                        @error('type')
                            <p class="error-msg fw-bold">{{$message}}</p>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <img class="w-25" src="{{ $comic->image }}" alt="{{$comic->title}}"><br>
                        <label for="type" class="form-label fw-bold">Immagine Copertina</label>
                        <input value="{{old("image", $comic->image)}}"
                        type="text"
                        id="image"
                        name="image"
                        class="form-control @error('image') is-invalid @enderror"
                        placeholder="Inserisci il link della copertina">
                        @error('image')
                            <p class="error-msg fw-bold">{{$message}}</p>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-success fw-bold">Modifica</button>

                </form>
            </div>
        </div>

    </div>
@endsection
