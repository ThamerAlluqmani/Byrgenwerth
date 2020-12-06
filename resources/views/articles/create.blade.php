@extends('layouts.app')
@section('title',__('Create article'))
@section('content')



    <div class="text-center">
        <h2>{{__("Create new article")}}</h2>
    </div>

    <form action="{{route('articles.store')}}" method="post">

        @include('articles._form' , ['submitText'=> __('Save')])

    </form>





@endsection
