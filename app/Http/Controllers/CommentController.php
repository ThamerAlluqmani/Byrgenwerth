<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware("auth");
    }

    public function store(Request $request , Article $article)
    {



        $validateFields = [
            'content'=>'min:3|max:200|required',
        ];
        $this->validate($request,$validateFields);

        $request['user_id'] = Auth::id();


        $article->comments()->create($request->all());

        return redirect()->back();

    }
}
