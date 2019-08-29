@extends('adminlte::page')

@section('title', 'Create Author')

@section('content')
<form class="" action="{{ route('author.store') }}" method="POST">
    @csrf
    <div class="form-group">
        <label for="title">Name</label>
        <input type="text" name="name" class="form-control" placeholder="Name" required>
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
@endpush
