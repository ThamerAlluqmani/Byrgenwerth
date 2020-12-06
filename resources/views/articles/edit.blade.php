@extends('layouts.app')
@section('title',__('Edit article'))
@section('content')





    <div class="text-center">
        <h2>{{__("Edit article")}} : {{$article->title}}</h2>
    </div>
    <form action="{{route('articles.update' , $article)}}" method="post">
        @method('PATCH')
        @include('articles._form' , ['submitText'=> __('Edit')])

    </form>





@endsection
