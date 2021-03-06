@extends('adminlte::page')

@section('title', 'Create Media')

@section('content')
<form class="" action="{{ route('media.store') }}" method="POST">
    @csrf
    <div class="form-group">
        <label for="title">Name</label>
        <input type="text" name="name" class="form-control" placeholder="Title" required>
    </div>
    <div class="form-group">
        <label for="">Media Image</label>
        <div class="input-group">
            <span class="input-group-btn">
                <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
                    <i class="fa fa-picture-o"></i> Choose
                </a>
            </span>
            <input id="thumbnail" class="form-control" type="text" name="image" required>

        </div>
        <span>Please put image on the media folder (400 x 180)</span><br>
        <img id="holder" style="margin-top:15px;max-height:100px;max-width:100px;">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
@stop

@section('css')

@stop

@section('js')

@stop


@push('css')
@endpush

@push('js')
<script src="{{ asset('vendor/laravel-filemanager/js/lfm.js') }}"></script>
<script>
    var route_prefix = "{{ url(config('lfm.url_prefix')) }}";
    $('#lfm').filemanager('image', {
        prefix: route_prefix
    });
</script>
@endpush
