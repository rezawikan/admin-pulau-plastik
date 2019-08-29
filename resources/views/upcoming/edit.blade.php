@extends('adminlte::page')

@section('title', 'Update Upcoming')

@section('content')
<form class="" action="{{ route('upcoming.update',['id' => $screening->id ]) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="title">Title</label>
        <input type="text" name="title" value="{{ $screening->title }}" class="form-control" placeholder="Title" required>
    </div>
    <div class="form-group">
        <label for="">Location</label>
        <textarea type="text" name="location" class="form-control" placeholder="Location" required>{{ $screening->location }}</textarea>
    </div>

    <div class="form-group">
        <label for="">Date Detail</label>
        <input type="text" name="date" value="{{ $screening->date }}" class="form-control" placeholder="Date Detail" required>
    </div>
    <div class="form-group">
        <label for="">Date</label>
        <input type="datetime-local" name="created_at" value="{{ $screening->created_at->format('Y-m-d\Th:m') }}" class="form-control" id="created_at" placeholder="Date" required>
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
