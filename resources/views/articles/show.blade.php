@extends('layouts.app')
@section('title', $article->title)
@section('content')

    @if(Session::has('successMsg'))
        @include('_alerts.success')
    @endif


    <div class="card">
        <div class="card-header">
            <h4>{{$article->title}}</h4>
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
        </div>
    </div>
    @auth

        @forelse($articles as $article)


            <div class="list-group-item">
                <div class="align-items-center">
                    <a href="{{route('articles.edit', $article)}}" class="btn btn-warning">{{__("Edit")}}</a>
                    <form method="post" action="{{route('articles.destroy', $article)}}" style="display: inline-block">
                        @method('DELETE')
                        @csrf
                        <button onclick="return confirm('{{__("Are you sure you want to delete this article ?")}}')"
                                class="btn btn-danger">{{__("Delete")}}</button>
                    </form>
                </div>
            </div>




        @empty
            <p class="text-black-50">{{__("You don't have any articles yet")}}</p>
        @endforelse

    @endauth

    <div class="text-muted mt-4">
        <h4>
            {{__("Comments")}}
        </h4>
    </div>
    <div id="comments" class="mt-4">
        @forelse($article->comments as $comment)


            <div class="card p-3 mb-2">
                <p>{{__("Author")}} : {{$comment->user->name}}</p>
                {{$comment->content}}


            </div>
        @empty
            {{__("No comments yet")}}




        @endforelse

    </div>



    @auth
        <div id="commentForm" class="mt-5">

            <div class="card">
                <h5 class="card-header bg-secondary text-white">{{__("Comment")}}</h5>

                <div class="card-body">
                    <form action="{{route('comments.store' , $article->id)}}" method="post">
                        @csrf
                        <div class="form-group">
                            <textarea name="content" id="content" cols="30" rows="10" class="form-control"
                                      placeholder="{{__("Type your comment here")}}"></textarea>
                        </div>

                        <div class="form-group">


                            <button class="btn btn-success" type="submit">{{__("Submit")}}</button>
                        </div>

                    </form>
                </div>
            </div>


        </div>
    @else
        <a href="{{route('login')}}" class="btn btn-link mb-4">{{__("Login to comment")}}</a>

    @endauth



@endsection
