
<div class="col-md-4 pb-3" style="text-decoration: none">
<a style="text-decoration: none;" class="text-info" href="{{route('articles.show' , $article->id)}}">  <h4 class="card-header "><i class="fa fa-file-text-o"></i>  {{$article->title}}</h4></a>

    <div class="card">
        <div class="card-body">
            <p>{{implode(' ', array_slice(explode(' ', $article->info), 0, 10))}} ... <a href="{{route('articles.show' , $article->id)}}">{{__("Show more")}}</a></p>
        </div>
        <div class="card-footer">
            <i class="fa fa-user fa-lg mb-2"></i> : {{$article->user->name}}
        </div>

    </div>
</div>
