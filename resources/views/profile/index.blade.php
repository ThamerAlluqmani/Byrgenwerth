@extends('layouts.app')
@section('title' , __('Profile'))
@section('content')
    @if(Session::has('successMsg'))
        @include('_alerts.success')
    @endif

    <div class="card">
        <div class="text-center card-header text-muted">
            <h4><i class="fa fa-user"></i> {{__("Profile")}}</h4>

        </div>

        <div class="card-body">

            <div class="">
               <h4>
                   <label class="text-info d-inline-block" for="name"><b>{{__("Name")}} : </b></label>
                   <p class="d-inline-block">{{$user->name}}</p>
               </h4>
            </div>

            <div class="">
                <h4>
                    <label class="text-info d-inline-block" for="email"><b>{{__("Email")}} : </b></label>
                    <p class="d-inline-block">{{$user->email}}</p>
                </h4>
            </div>

            <a  class="btn btn-warning" href="{{route('profile.edit' , $user)}}"><i class="fa fa-edit"></i> {{__("Edit")}}</a>


        </div>
    </div>


@endsection
