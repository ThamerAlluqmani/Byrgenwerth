@extends('layouts.app')
@section('title' , __('Profile'))
@section('content')
    @if(Session::has('successMsg'))
        @include('_alerts.success')
    @endif
    <a  class="btn btn-warning" href="{{route('profile.edit' , $user)}}"><i class="fa fa-edit"></i> {{__("Edit")}}</a>


@endsection
