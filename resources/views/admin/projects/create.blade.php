@extends('layouts.app')

@section('content')

    <h1 class="text-center">Creazione nuovo Comics</h1>

    <div class="container">
        <form action="{{ route("admin.projects.store") }}" method="post">
            @csrf

            <div class="mb-3">
                <label for="form-label">Titolo</label>
                <input type="text" class="form-control" name="title">
            </div>
            <div class="mb-3">
                <label for="form-label">URL immagine</label>
                <input type="text" class="form-control" name="imageURL">
            </div>
            <div class="mb-3">
                <label for="form-label">Github URL</label>
                <input type="text" class="form-control" name="githubURL">
            </div>
            <div class="mb-3">
                <label for="form-label">Descrizione</label>
                <textarea class="form-control" name="description"></textarea>
            </div>
            <div class="mb-3">
                <label for="form-label">Progetto terminato:</label>
                <select type="text" class="form-control" name="finished">
                    <option value="true">Yes</option>
                    <option value="false">No</option>
                </select>
            </div>
            <a href={{route("admin.projects.index")}} class="btn btn-outline-dark me-2">Indietro</a>
            <button class="btn btn-outline-dark">Salva</button>
        </form>
    </div>

@endsection