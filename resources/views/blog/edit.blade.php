@extends('adminlte::page')

@section('title', 'Create Blog')

@section('content')
<ul class="nav nav-tabs" id="myTab" role="tablist">
    @foreach (config('translatable.locales') as $key => $value)
    <li class="nav-item">
        <a class="nav-link {{ $key == 0 ? 'active' : '' }}" id="{{ $value }}-tab" data-toggle="tab" href="#{{ $value }}" role="tab" aria-controls="home" aria-selected="true">{{ strtoupper($value) }}</a>
    </li>
    @endforeach
</ul>
<div class="tab-content">
    <form class="" action="{{ route('blog.update',['id' => $post->id ]) }}" method="POST">
        @method('PUT')
        @csrf
        @foreach (config('translatable.locales') as $key => $value)
        <div class="tab-pane fade show active" id="{{ $value }}" role="tabpanel" aria-labelledby="{{ $value }}-tab">
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" value="{{ $post->translate($value)->title ?? null }}" name="{{ $value }}_title" class="form-control" id="{{ $value }}-title" placeholder="Title">
            </div>
            <div class="form-group">
                <label for="">Content</label>
                <textarea type="text" name="{{ $value }}_content" class="form-control text-editor" id="{{ $value }}-content" placeholder="Content">{{ $post->translate($value)->content ?? null }}</textarea>
            </div>
        </div>
        @endforeach

        <div class="form-group">
            <label for="">Author</label>
            <select name="author" class="custom-select form-control" required>
                <option selected>Select</option>
                @foreach ($authors as $key => $value)
                <option value="{{ $value->id }}" {{ $post->author->id == $value->id ? 'selected' : ''  }}>{{ $value->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="">Date</label>
            <input type="datetime-local" name="created_at" value="{{ $post->created_at->format('Y-m-d\Th:m') }}" class="form-control" id="created_at" placeholder="Date" required>
        </div>
        <div class="form-group">
            <label for="">Thumbnail Image</label>
            <div class="input-group">
                <span class="input-group-btn">
                    <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
                        <i class="fa fa-picture-o"></i> Choose
                    </a>
                </span>
                <input id="thumbnail" value="{{ $post->image }}" class="form-control" type="text" name="image" required>
            </div>
            <span>Please put image on the blog folder (scale 19:6)</span><br>
            <img id="holder" src="{{ config('app.url').$post->image  }}" style="margin-top:15px;max-height:100px;">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@stop

@section('css')

@stop

@section('js')
@stop


@push('css')
<style media="screen">
    .fade {
        display: none !important;
    }

    .fade.in {
        display: block !important;
    }

    .tab-content {
        margin-top: 25px;
    }
</style>
@endpush

@push('js')
<!-- CKEditor init -->
<script src="//cdnjs.cloudflare.com/ajax/libs/ckeditor/4.5.11/ckeditor.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/ckeditor/4.5.11/adapters/jquery.js"></script>
<script src="{{ asset('vendor/laravel-filemanager/js/lfm.js') }}"></script>
<script>
    $(function() {
        $('#myTab li:first-child a').tab('show')
    })
</script>
<script>
    var route_prefix = "{{ url(config('lfm.url_prefix')) }}";
</script>
<script>
    $('.text-editor').ckeditor({
        height: 600,
        filebrowserImageBrowseUrl: route_prefix + '?type=Images',
        filebrowserImageUploadUrl: route_prefix + '/upload?type=Images&_token={{csrf_token()}}',
        filebrowserBrowseUrl: route_prefix + '?type=Files',
        filebrowserUploadUrl: route_prefix + '/upload?type=Files&_token={{csrf_token()}}'
    });

    $('#lfm').filemanager('image', {
        prefix: route_prefix
    });
</script>
@endpush
