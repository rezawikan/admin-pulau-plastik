@extends('adminlte::page')

@section('title', 'Create PSAs')

@section('content')
<form class="" action="{{ route('psas.store') }}" method="POST">
    @csrf
    <div class="form-group">
        <label for="">Link</label>
        <input type="text" name="link" class="form-control" placeholder="Link - Please fill # if there is no link" required>
    </div>
    <div class="form-group">
        <label for="">Order</label>
        <input type="number" name="order" class="form-control" placeholder="Order" required>
    </div>
    <div class="form-group">
        <label for="">Supporter Image</label>
        <div class="input-group">
            <span class="input-group-btn">
                <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
                    <i class="fa fa-picture-o"></i> Choose
                </a>
            </span>
            <input id="thumbnail" class="form-control" type="text" name="image" required>

        </div>
        <span>Please put image on the psas folder (scale 3:1)</span><br>
        <img id="holder" style="margin-top:15px;max-height:100px;">
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
