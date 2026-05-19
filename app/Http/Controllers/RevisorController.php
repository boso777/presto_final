<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;

class RevisorController extends Controller
{
    public function index(){
        $article_to_check = Article::where('is_accepted' , null)->first();
        return view('revisor.index' , compact('article_to_check'));
    }
    
    public function accept(Article $article)
    {
        $article->setAccepted(true);
        return redirect()
            ->back()
            ->with('message', "Hai accettato l'articolo $article->title");
    }

    public function reject(Article $article)
    {
        $article->setAccepted(false);
        return redirect()
            ->back()
            ->with('message', "Hai rifiutato l'articolo $article->title");
    }
}
