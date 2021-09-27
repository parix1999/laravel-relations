@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="top">
            <h1>Anteprima di tutti i nostri articoli</h1>
            <div>
                <a href="{{ route('articles.create') }}">
                    <button type="button" class="btn btn-outline-success">Crea un nuovo articolo</button>
                </a>
            </div>
        </div>
        <div class="row">
            @foreach($allArticles as $article)
                <div class="space col-6 col-xs-6 col-sm-4 col-mg-3 col-lg-3">
                    <div class="card">
                        <div class="title">
                            <strong>{{ $article->title }}</strong>
                        </div>
                        <div class="image">
                            <img src="{{ $article->cover }}" alt="articolo {{ $article->title }}">
                        </div>
                        <div class="description">
                            {{ $article->descrizione }}
                        </div>
                        
                        <a href="{{ route('articles.show', $article) }}">
                            <button type="button" class="btn btn-primary">Mostra</button>
                        </a>                  
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection