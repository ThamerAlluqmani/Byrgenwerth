@extends('layouts.app')
@section('title' , __('Profile'))
@section('content')

    <a  class="btn btn-warning" href="{{route('profile.edit' , $user)}}">edit profile</a>


@endsection
