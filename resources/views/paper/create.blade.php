<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form create</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    
</head>
<body>
    <div class="container">
    <form action="{{ route('articles.store') }}" method="POST">
        @csrf
        <h1>Dati Autore:</h1>
        <div class="form-group">
            <label for="email">Email address</label>
            <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp">
            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>
        <div class="form-group">
            <label for="name">Nome</label>
            <input type="text" class="form-control" name="name" id="name">
        </div>
        <div class="form-group">
            <label for="surname">Cognome</label>
            <input type="text" class="form-control" name="surname" id="surname">
        </div>
        <div class="form-group">
            <label for="birth_year">Anno di nascita</label>
            <input type="number" class="form-control" name="birth_year" id="birth_year" max="2004" min="1900">
        </div>

        <h1>Creazione Articolo:</h1>
        <div class="form-group">
            <label for="title">Titolo</label>
            <input type="text" class="form-control" name="title" id="title">
        </div>
        <div class="form-group">
            <label for="descrizione">Breve Descrizione</label>
            <input type="text" class="form-control" name="descrizione" id="descrizione">
        </div>
        <div class="form-group">
            <label for="cover">Foto</label>
            <input type="text" class="form-control" name="cover" id="cover" placeholder="Inserisci un'url">
        </div>

        <div class="form-group">
            <div class="div">Testo</div>
            <textarea name="testo" id="testo" cols="136" rows="10" placeholder="Inserisci qui il testo del tuo articolo..."></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    </div>
</body>
</html>