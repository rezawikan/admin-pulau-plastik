@extends('adminlte::page')

@section('title', 'Update Supporter')

@section('content')
<form class="" action="{{ route('supporter.update',['id' => $supporter->id ]) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="">Link</label>
        <input type="text" name="link" value="{{ $supporter->link }}" class="form-control" placeholder="Link - Optional" required>
    </div>
    <div class="form-group">
        <label for="">Order</label>
        <input type="number" name="order" value="{{ $supporter->order }}" class="form-control" placeholder="Order" required>
    </div>
    <div class="form-group">
        <label for="">Supporter Image</label>
        <div class="input-group">
            <span class="input-group-btn">
                <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
                    <i class="fa fa-picture-o"></i> Choose
                </a>
            </span>
            <input id="thumbnail" value="{{ $supporter->image }}" class="form-control" type="text" name="image" required>

        </div>
        <span>Please put image on the supporter folder (200 x 150)</span><br>
        <img id="holder" src="{{ config('app.url').$supporter->image  }}" style="margin-top:15px;max-height:100px;">
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
