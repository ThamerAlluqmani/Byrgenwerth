


<textarea name="content" id="content" cols="30" rows="10" class="form-control">@isset($article){{$article->content}}@endisset</textarea>




<script src="{{asset('editor/ckeditor/ckeditor.js')}}"></script>

@if(config('app.locale') == 'ar')
    <script type="text/javascript">
        CKEDITOR.replace('content', {
            filebrowserUploadUrl: "{{route('ckeditor.image-upload', ['_token' => csrf_token() ])}}",
            filebrowserUploadMethod: 'form',
            language: 'ar'
        });
    </script>

@else
    <script type="text/javascript">
        CKEDITOR.replace('content', {
            filebrowserUploadUrl: "{{route('ckeditor.image-upload', ['_token' => csrf_token() ])}}",
            filebrowserUploadMethod: 'form',
        });
    </script>
@endif
