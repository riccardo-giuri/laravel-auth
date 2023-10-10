@extends('layouts.app')

@section('content')
    <h1 class="text-center pt-3">Dettagli del progetto</h1>

    <div class="container">
        <div class="row">
            <div class="col-6">
                <img src={{ $project->imageURL}} alt="" class="w-100">
            </div>

            <div class="col-6">
                <ul class="comicDetails">
                    <li>
                        <span class="list_item_title">Titolo: </span>
                        <span>{{$project->title}}</span>
                    </li>
                    <li>
                        <span class="list_item_title">Descrizione: </span>
                        <span>{{$project->description}}</span>
                    </li>
                    <li>
                        <span class="list_item_title">Link progetto: </span>
                        <span><a href="{{ $project->githubURL }}">{{$project->githubURL}}</a></span>  
                    </li>
                    <li>
                        <div class="route_buttons d-flex gap-2 mt-2">
                            <a href="#" class="btn btn-outline-dark">Modifica Comic</a>
                            {{-- <form action="" method="POST">
                                @csrf

                                @method('delete')

                                <input type="submit" value="Cancella Comic" class="btn btn-outline-light">
                            </form> --}}
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>

@endsection