
<div class="col-md-4 pb-3" style="text-decoration: none">
<a style="text-decoration: none;" class="text-info" href="{{route('articles.show' , $article->id)}}">  <h4 class="card-header ">{{$article->title}}</h4></a>

    <div class="card">
        <div class="card-body">
            <p>{{implode(' ', array_slice(explode(' ', $article->content), 0, 10))}} ... <a href="{{route('articles.show' , $article->id)}}">{{__("Show more")}}</a></p>
        </div>
        <div class="card-footer">
            {{__("Author")}} : {{$article->user->name}}
        </div>

    </div>
</div>
