@extends('layouts.main')

@section('content')
    <div class="container my-5">
        <div class="row">
            <div class="col-6 offset-3">

                <h2 class="mb-4">Inserisci nuovo comic</h2>

                <form action="{{ route('comics.store') }}" method="POST">
                    {{-- @csrf deve essere inserito in tutti i form. se questo non viene inserito, il form non risulta valido--}}
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label fw-bold">Titolo</label>
                        {{-- il name dell'input deve risultare al nome della colonna della tabella di riferimento --}}
                        <input type="text" id="title" name="title" class="form-control" placeholder="Inserisci il titolo del comic">
                    </div>
                    <div class="mb-3">
                        <label for="type" class="form-label fw-bold">Tipo</label>
                        <input type="text" id="type" name="type" class="form-control" placeholder="Inserisci la tipologia del comic (es. graphic novel)" >
                    </div>
                    <div class="mb-3">
                        <label for="image" class="form-label fw-bold">Immagine Copertina</label>
                        <input type="text" id="image" name="image" class="form-control" placeholder="Inserisci il link della copertina" >
                    </div>

                    <button type="submit" class="btn btn-success fw-bold">Invia</button>
                </form>
            </div>
        </div>

    </div>
@endsection
