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
        <h1>Tutti i nostri articoli</h1>
        <div class="row">
            @foreach($allArticles as $article)
            <div class="space col-3">
                <div class="card">
                    <div class="title">
                        {{ $article->title }}
                    </div>
                    <div class="image">
                        <img src="{{ $article->cover }}" alt="articolo {{ $article->title }}">
                    </div>
                </div>
            </div>
            @endforeach
        </div>

    </div>
</body>
</html>