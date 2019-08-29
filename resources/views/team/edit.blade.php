@extends('adminlte::page')

@section('title', 'Update Team')

@section('content')
<form class="" action="{{ route('team.update',['id' => $team->id ]) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="title">Name</label>
        <input type="text" value="{{ $team->name }}" name="name" class="form-control" placeholder="Title" required>
    </div>
    <div class="form-group">
        <label for="">Position</label>
        <textarea type="text" name="position" class="form-control" placeholder="Position" required>{{ $team->position }}</textarea>
    </div>
    <div class="form-group">
        <label for="">Order</label>
        <input type="number" value="{{ $team->order }}" name="order" class="form-control" placeholder="Order" required>
    </div>
    <div class="form-group">
        <label for="">Team Image</label>
        <div class="input-group">
            <span class="input-group-btn">
                <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
                    <i class="fa fa-picture-o"></i> Choose
                </a>
            </span>
            <input id="thumbnail" class="form-control" type="text" name="image" value="{{ $team->image }}" required>

        </div>
        <span>Please put image on the team folder</span><br>
        <img src="{{ config('app.url').$team->image  }}" id="holder" style="margin-top:15px;max-height:100px;max-width:100px;">
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
