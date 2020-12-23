<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;

class PageControl extends Controller
{
    public function __construct()
    {

    }

    public function index(){
        $articles = Article::take(3)->orderBy('id' , 'DESC')->get();

        return view('index' , compact('articles'));
    }
    public function contact(){
        return view('contact');
    }

}
