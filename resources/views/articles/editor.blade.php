<script src="//cdn.ckeditor.com/4.15.1/full/ckeditor.js"></script>

<script type="text/javascript">
    $(document).ready(function () {
        $('.ckeditor').ckeditor();
    });
</script>

<script type="text/javascript">
    CKEDITOR.replace('content', {
        filebrowserUploadUrl: "{{route('ckeditor.image-upload', ['_token' => csrf_token() ])}}",
        filebrowserUploadMethod: 'form'
    });
</script>

<textarea name="content" id="content" cols="30" rows="10"
          class="ckeditor form-control">@isset($article){{$article->content}}@endisset</textarea>
