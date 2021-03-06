<div class="col-md-4 pb-3" style="text-decoration: none">
    <a style="text-decoration: none;" class="text-info" href="{{route('articles.show' , $article->id)}}"><h4
            class="card-header "><i class="fa fa-file-text-o"></i> {{$article->title}}</h4></a>

    <div class="card">
        <div class="card-body">
            <p>{{implode(' ', array_slice(explode(' ', $article->info), 0, 20))}} ... <a
                    href="{{route('articles.show' , $article->id)}}">{{__("Show more")}}</a></p>
        </div>
        <div class="card-footer">
            {{--            <i class="fa fa-user fa-lg mb-2"></i> <a class="text-info" style="text-decoration: none" href="{{route('profile.show' , $article->user->id)}}">{{$article->user->name}}</a>--}}
            <p><i class="fa fa-user fa-lg mb-2"></i> {{$article->user->name}}</p>
            <p><i class="fa fa-list-alt fa-lg mb-2"></i>@foreach ($article->categories()->get() as $categoris)
                    {{ $loop->first ? '' : ' , ' }}
                    <span>{{ $categoris->title }}</span>
                @endforeach
            </p>
        </div>

    </div>
</div>
