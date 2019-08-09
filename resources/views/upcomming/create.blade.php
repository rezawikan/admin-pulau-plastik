@extends('adminlte::page')

@section('title', 'Create Screening')

@section('content')
<div class="container">
    <form class="" action="{{ route('upcomming.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" class="form-control" placeholder="Title" >
        </div>
        <div class="form-group">
            <label for="">Location</label>
            <textarea type="text" name="location" class="form-control" placeholder="Location" ></textarea>
        </div>

        <div class="form-group">
            <label for="">Date Detail</label>
            <input type="text" name="date" class="form-control" placeholder="Date" >
        </div>
        <div class="form-group">
            <label for="">Date</label>
            <input type="datetime-local" name="created_at" class="form-control" id="created_at" placeholder="Date" >
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
@endpush

@push('js')

@endpush
