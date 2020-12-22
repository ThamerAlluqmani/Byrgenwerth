<?php

namespace App\Http\Controllers;

use App\Article;
use App\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware("auth");
    }

    public function store(Request $request, Article $article)
    {


        $validateFields = [
            'content' => 'min:3|required',
        ];
        $this->validate($request, $validateFields);

        $request['user_id'] = Auth::id();


        $article->comments()->create($request->all());

        $article->comments()->user_id = \Auth::user()->id;
        $article->save();



        return redirect()->back();

    }


    public function destroy(Request $request, Comment $comment)
    {

        if (Auth::id() != $comment->user_id) {

            return abort(401);

        } else {
            $comment->delete();
            $request->session()->flash('successMsg', __("Comment has been deleted successfully"));
            return redirect()->back();

        }

        //
    }


}
