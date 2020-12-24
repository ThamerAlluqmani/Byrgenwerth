@extends('layouts.app')
@section('title',__('Articles'))
@section('content')




    <div class="card mt-5">
        <div class="card-header"><h3 class="text-muted text-center">{{__("All articles")}}</h3></div>


        <div class="card-body">
            <div class="row">
                @forelse($articles as $article)

                    @include('articles._article-template')

                @empty
                    {{__("No articles yet")}}
                @endforelse
            </div>
        </div>
    </div>





@endsection
