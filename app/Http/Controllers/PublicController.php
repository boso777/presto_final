<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function homepage(){
        $articles = Article::take(6)->orderBy('created_at', 'desc')->get();
        return view('welcome' ,compact('articles'));
    }

    public function index(){
        $articles = Article::orderBy('created_at', 'desc')->paginate(6);
        return view('article.index' ,compact('articles'));
    }
}
