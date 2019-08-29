@extends('adminlte::page')

@section('title', 'Update Gallery')

@section('content')
<form class="" action="{{ route('gallery.update',['id' => $gallery->id ]) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="">Order</label>
        <input type="number" value="{{ $gallery->order }}" name="order" class="form-control" placeholder="Order" required>
    </div>
    <div class="form-group">
        <label for="">Gallery Image</label>
        <div class="input-group">
            <span class="input-group-btn">
                <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
                    <i class="fa fa-picture-o"></i> Choose
                </a>
            </span>
            <input id="thumbnail" class="form-control" type="text" name="image" value="{{ $gallery->image }}" required>

        </div>
        <span>Please put image on the gallery folder (scale 19:6)</span><br>
        <img src="{{ config('app.url').$gallery->image  }}" id="holder" style="margin-top:15px;max-height:100px;max-width:100px;">
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
