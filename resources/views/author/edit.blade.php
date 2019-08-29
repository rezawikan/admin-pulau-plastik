@extends('adminlte::page')

@section('title', 'Update Author')

@section('content')
<form class="" action="{{ route('author.update',['id' => $author->id ]) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="title">Name</label>
        <input type="text" value="{{ $author->name }}" name="name" class="form-control" placeholder="Name" required>
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
