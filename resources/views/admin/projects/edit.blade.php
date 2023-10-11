@extends('layouts.app')

@section('content')

    <h1 class="text-center">Modifica il Progetto</h1>

    <div class="container">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action={{ route("admin.projects.update", $project->slug) }} method="post">
            @csrf

            @method('patch');

            <div class="mb-3">
                <label for="form-label">Titolo</label>
                <input type="text" class="form-control" name="title" value="{{ $project->title }}">
            </div>
            <div class="mb-3">
                <label for="form-label">URL immagine</label>
                <input type="text" class="form-control" name="imageURL" value="{{ $project->imageURL }}">
            </div>
            <div class="mb-3">
                <label for="form-label">Github URL</label>
                <input type="text" class="form-control" name="githubURL" value="{{ $project->githubURL }}">
            </div>
            <div class="mb-3">
                <label for="form-label">Descrizione</label>
                <textarea class="form-control" name="description">{{ $project->description }}"</textarea>
            </div>
            <div class="mb-3">
                <label for="form-label">Progetto terminato:</label>
                <select type="text" class="form-control" name="finished">
                    <option value='1' {{ $project->finished == '1' ? 'selected' : ""}}>Yes</option>
                    <option value='0' {{ $project->finished == '0' ? 'selected' : ""}}>No</option>
                </select>
            </div>
            <a href={{route("admin.projects.index")}} class="btn btn-outline-dark me-2">Indietro</a>
            <button class="btn btn-outline-dark">modifica</button>
        </form>
    </div>

@endsection