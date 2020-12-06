@extends('layouts.app')
@section('title' , __('Dashboard'))
@section('content')


    @if(Session::has('successMsg'))
        @include('_alerts.success')
    @endif
    <div class="container">

        <div class="text-center">
            <a href="{{route('articles.create')}}" class="btn btn-lg btn-primary mb-4">{{__("Create new article")}}</a>
            <a href="{{route('articles.index')}}" class="btn btn-lg btn-primary mb-4">{{__("Browse all articles")}}</a>

        </div>


        @forelse($articles as $article)
            <div class="mb-2">

                <a href="{{route('articles.show', $article)}}">{{$article->title}}</a>

                <a href="{{route('articles.edit', $article)}}" class="btn btn-warning">{{__("Edit")}}</a>
                <form method="post" action="{{route('articles.destroy', $article)}}" style="display: inline-block">
                    @method('DELETE')
                    @csrf
                    <button onclick="return confirm('{{__("Are you sure you want to delete this article ?")}}')" class="btn btn-danger">{{__("Delete")}}</button>
                </form>
            </div>
        @empty
            <p>{{__("You don't have any articles yet")}}</p>
        @endforelse




    </div>



@endsection
