<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All articles</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    
</head>
<body>
    <div class="container">
        <h1>Articolo di {{ $article->author->name }}  {{ $article->author->surname }}</h1>   
        <div class="row">
            <div class="space col-12">
    
                <div class="titleshow">
                    <strong>{{ $article->title }}</strong>
                </div>
                <div class="image-show">
                    <img src="{{ $article->cover }}" alt="articolo {{ $article->title }}">
                </div>
                <div class="testo-articolo">
                    {{ $article->testo }}
                </div>

                <div class="specifiche">
                    <div class="uno">
                        <div class="data">Dati autore:</div>
                        <div class="age"><strong>Nato il</strong> {{ $article->author->birth_year }}</div>
                        <div class="email"><strong>email:</strong> {{ $article->author->email }}</div>
                    </div>
                    <div class="due">
                        <a href="{{ route('articles.index') }}">Torna a tutti gli aricoli</a>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</body>
</html>