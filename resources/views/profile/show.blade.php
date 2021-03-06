@extends('layouts.app')
@section('title', $article->user()->name)
@section('content')

    @if(Session::has('successMsg'))
        @include('_alerts.success')
    @endif


    <div class="card">
        <div class="card-header">
            <h4><i class="fa fa-file-text"></i> {{__("Profile")}}</h4>
        </div>

        <div class="card-body">
            {{ $article->user() }}
        </div>

        <div class="card-footer">
            <div>
            <span>
           <b> {{__("Author")}} :</b> {{$article->user()->name}}
        </span>

            </div>
            <div>
            <span>
           <b> {{__("Created at")}} :</b> {{$article->user()->created_at}}
        </span>
            </div>

            <div>
            <span>
           <b> {{__("Updated at")}} :</b> {{$article->user()->updated_at}}
        </span>
            </div>

            @auth
                @if($article->user()->id === \Auth::user()->id)
                    <div class="align-items-center">

                        <br>
                        <a href="{{route('profile.edit', $article->user())}}" class="btn btn-warning"><i class="fa fa-edit"></i> {{__("Edit")}}</a>
                        <form method="post" action="{{route('profile.destroy', $article->user())}}" style="display: inline-block">
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


@endsection
