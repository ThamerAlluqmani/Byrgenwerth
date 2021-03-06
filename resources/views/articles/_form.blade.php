@csrf

<div class="form-group">
    <label for="title">{{__("Title")}}</label>
    <input type="text" name="title" class="form-control" @isset($article) value="{{$article->title}}" @endisset>
</div>

<div class="form-group">
    @foreach($categories as $key => $title)
        <label for="category_{{$key}}">{{$title}}</label>

        <input id="category_{{$key}}" type="checkbox" name="categories[]" value="{{$key}}"

               @if(isset($article) && in_array($key , $articleCategories))
               checked
            @endif


        >

    @endforeach
</div>

<div class="form-group">
    <label for="content">{{__("Info")}}</label>

    <textarea name="info" id="info" cols="3" rows="3"
              placeholder="{{__("Simple overview about the content")}}"
              class="form-control">@isset($article){{$article->info}}@endisset</textarea>


</div>
<div class="form-group">
    <label for="content">{{__("Content")}}</label>
    @include('articles.editor')
</div>

<div class="form-group">
    <button class="btn btn-lg btn-success">{{$submitText}}</button>
</div>


