@extends('layouts.app')
@section('title', $article->title)
@section('content')

    @if(Session::has('successMsg'))
        @include('_alerts.success')
    @endif


    <div class="card">
        <div class="card-header">
            <h4><i class="fa fa-file-text"></i> : {{$article->title}}</h4>
        </div>

        <div class="card-body">

            {{--            {!! nl2br(e($article->content)) !!}--}}
            {!! $article->content !!}

        </div>

        <div class="card-footer">
            <div>
            <span>
           <b> {{__("Author")}} :</b> {{$article->user->name}}
        </span>

            </div>
            <div>
            <span>
           <b> {{__("Created at")}} :</b> {{$article->created_at}}
        </span>
            </div>

            <div>
            <span>
           <b> {{__("Updated at")}} :</b> {{$article->updated_at}}
        </span>
            </div>

            @auth
                @if($article->user_id === \Auth::user()->id)
                    <div class="align-items-center">

                        <br>
                        <a href="{{route('articles.edit', $article)}}" class="btn btn-warning"><i class="fa fa-edit"></i> {{__("Edit")}}</a>
                        <form method="post" action="{{route('articles.destroy', $article)}}" style="display: inline-block">
                            @method('DELETE')
                            @csrf
                            <button onclick="return confirm('{{__("Are you sure you want to delete this article ?")}}')"
                                    class="btn btn-danger"><i class="fa fa-trash"></i> {{__("Delete")}}</button>
                        </form>
                    </div>
                @endif
            @endauth
        </div>
    </div>


    <div class="text-muted mt-4">
        <h4>
            {{__("Comments")}}
        </h4>
    </div>

    @auth
        <div id="commentForm" class="mt-5">

            <div class="card">
                <h5 class="card-header bg-secondary text-white"><i class="fa fa-comment"></i> {{__("Comment")}}</h5>

                <div class="card-body">
                    <form action="{{route('comments.store' , $article->id)}}" method="post">
                        @csrf
                        <div class="form-group">
                            <textarea name="content" id="content" cols="30" rows="10" class="form-control"
                                      placeholder="{{__("Type your comment here")}}"></textarea>
                        </div>

                        <div class="form-group">


                            <button class="btn btn-secondary" type="submit"><i class="fa fa-send"></i> {{__("Submit")}}</button>
                        </div>

                    </form>
                </div>
            </div>


        </div>
    @else
        <a href="{{route('login')}}" style="text-decoration: none"   class="text-info "> <i class="fa fa-user"></i> {{__("Login to comment")}}</a>

    @endauth

    <div id="comments" class="mt-4">
        @forelse($article->comments()->orderBy('id', 'DESC')->get() as $comment)


            <h5 class="card-header "><i class="fa fa-user"></i> : {{$comment->user->name}}</h5>
            <div class="card p-3 mb-2">

                <br>
                <p>{{$comment->content}}</p>

                @auth

                    @if($comment->user_id === \Auth::user()->id)
                        <div class="align-items-center text-lg-left d-inline">
                            <br>
                            <form method="post" action="{{route('comments.destroy', $comment->id)}}"
                                  style="display: inline-block">
                                @method('DELETE')
                                @csrf
                                <button
                                    onclick="return confirm('{{__("Are you sure you want to delete this comment ?")}}')"
                                    class="btn btn-danger"><i class="fa fa-trash"></i> {{__("Delete comment")}}</button>
                            </form>
                        </div>
                    @endif
                @endauth


            </div>
        @empty
            {{__("No comments yet")}}




        @endforelse

    </div>







@endsection
