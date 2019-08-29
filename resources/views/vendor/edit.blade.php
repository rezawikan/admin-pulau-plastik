@extends('adminlte::page')

@section('title', 'Create Vendor')

@section('content')
<ul class="nav nav-tabs" id="myTab" role="tablist">
    @foreach (config('translatable.locales') as $key => $value)
    <li class="nav-item">
        <a class="nav-link {{ $key == 0 ? 'active' : '' }}" id="{{ $value }}-tab" data-toggle="tab" href="#{{ $value }}" role="tab" aria-controls="home" aria-selected="true">{{ strtoupper($value) }}</a>
    </li>
    @endforeach
</ul>
<div class="tab-content">
    <form class="" action="{{ route('vendor.update',['id' => $vendor->id ]) }}" method="POST">
        @method('PUT')
        @csrf
        @foreach (config('translatable.locales') as $key => $value)
        <div class="tab-pane fade show active" id="{{ $value }}" role="tabpanel" aria-labelledby="{{ $value }}-tab">

            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" value="{{ $vendor->translate($value)->title ?? null }}" name="{{ $value }}_title" class="form-control" id="{{ $value }}-title" placeholder="Title">
            </div>
            <div class="form-group">
                <label for="">Summary</label>
                <textarea type="text" name="{{ $value }}_summary" class="form-control" id="{{ $value }}-summary" placeholder="Content">{{ $vendor->translate($value)->summary ?? null }}</textarea>
            </div>
            <div class="form-group">
                <label for="">Content</label>
                <textarea type="text" name="{{ $value }}_content" class="form-control text-editor" id="{{ $value }}-content" placeholder="Content">{{ $vendor->translate($value)->content ?? null }}</textarea>
            </div>

        </div>
        @endforeach

        <div class="form-group">
            <label for="">Thumbnail Image</label>
            <div class="input-group">
                <span class="input-group-btn">
                    <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
                        <i class="fa fa-picture-o"></i> Choose
                    </a>
                </span>
                <input id="thumbnail" class="form-control" type="text" name="image" value="{{ $vendor->image }}" required>

            </div>
            <span>Please take/put image on the gallary folder</span><br>
            <img src="{{ config('app.url').$vendor->image  }}" id="holder" style="margin-top:15px;max-height:100px;max-width:100px;">
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
