@extends('layouts.app')
@section('title' , __('Dashboard'))
@section('content')


    @if(Session::has('successMsg'))
        @include('_alerts.success')
    @endif

    <div class="card">

        <div class="text-center card-header text-muted">
         <h4><i class="fa fa-dashboard"></i> {{__("Dashboard")}}</h4>
        </div>


           <div class="text-center mt-3">
               <a href="{{route('articles.create')}}" class="btn  btn-primary mb-4"><i class="fa fa-file-text-o"></i> {{__("Create new article")}}</a>
               <a href="{{route('profile')}}" class="btn  btn-secondary mb-4"><i class="fa fa-file-text-o"></i> {{__("Profile")}}</a>
               <a href="{{route('articles.index')}}" class="btn btn-success mb-4"><i class="fa fa-files-o"></i> {{__("Browse all articles")}}</a>
           </div>

        <div class="container m-auto card-body">
            <h3 class="text-black-50">{{__("Your articles")}}</h3>

            @forelse($articles as $article)


                   <div class="list-group-item">
                       <div class="mb-4">
                          <div class="mb-4">
                              <a class="text-info" style="text-decoration: none" href="{{route('articles.show', $article)}}"><i class="fa fa-file-text"></i> {{$article->title}}</a>
                          </div>
                           <div class="align-items-center">
                               <a href="{{route('articles.edit', $article)}}" class="btn btn-warning"><i class="fa fa-edit"></i> {{__("Edit")}}</a>
                               <form method="post" action="{{route('articles.destroy', $article)}}" style="display: inline-block">
                                   @method('DELETE')
                                   @csrf
                                   <button onclick="return confirm('{{__("Are you sure you want to delete this article ?")}}')" class="btn btn-danger"><i class="fa fa-trash"></i> {{__("Delete")}}</button>
                               </form>
                           </div>
                       </div>
                   </div>



            @empty
                <p class="text-black-50">{{__("You don't have any articles yet")}}</p>
            @endforelse
        </div>
       </div>










@endsection
