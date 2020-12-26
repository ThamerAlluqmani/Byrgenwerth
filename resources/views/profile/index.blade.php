@extends('layouts.app')
@section('title' , __('Profile'))
@section('content')

    <form action="{{route('profile.update' , $user)}}" method="post">
        @method('PATCH')
        <div class="card">
            <div class="text-center card-header text-muted">
                <h4><i class="fa fa-user"></i> {{__("Profile")}}</h4>

            </div>

            <div class="card-body">

                <div class="form-group">
                    <label for="title">{{__("Name")}}</label>
                    <input type="text" name="title" class="form-control" @isset($user) value="{{$user->name}}" @endisset>
                </div>
                <div class="form-group">
                    <button class="btn btn-lg btn-success">{{__("Edit")}}</button>
                </div>
            </div>
        </div>

    </form>


@endsection
