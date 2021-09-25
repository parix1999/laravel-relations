<?php

namespace App\Http\Controllers;
// Passare i model:
use App\article;
use App\author;

use Illuminate\Http\Request;

class BackOfficeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // passo i dati:
        $allArticles = article::all();
        return view('paper.index', compact('allArticles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Rotta per il file php(form) della create:
        $allArticles = article::all();
        $allAuthors = author::all();
        return view('paper.create', compact('allArticles', 'allAuthors'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Creazione dei nuovi oggetti:
        $article = new article();
        $author = new author(); 

        // Funzione per il salvataggio dei dati:
        $this->saveItemFromRequest($article, $author, $request);
        
        return redirect()->route('articles.show', $article);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(article $article)
    {
        //passo i dati:
        //dd($article);
        return view('paper.show', compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    // Funzione per il salvataggio dati(oggetti):
    private function saveItemFromRequest(article $article, author $author, Request $request) {
        $data = $request->all(); // è un'array;

        $author->name = $data['name'];
        $author->surname = $data['surname'];
        $author->email = $data['email'];
        $author->birth_year = $data['birth_year'];
        $author->save();

        $article->title = $data['title'];
        $article->author_id = $author->id; // Li passo l'id del nuovo autore creato;
        $article->descrizione = $data['descrizione'];
        $article->testo = $data['testo'];
        $article->cover = $data['cover'];
        $article->save();
        
        
        

    }

}
