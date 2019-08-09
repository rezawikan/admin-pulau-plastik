@extends('adminlte::page')

@section('title', 'Update Upcomming')

@section('content')
  <div class="container">
      <form class="" action="{{ route('upcomming.update',['id' => $screening->id ]) }}" method="POST">
          @csrf
          @method('PUT')
          <div class="form-group">
              <label for="title">Title</label>
              <input type="text" name="title" value="{{ $screening->title }}" class="form-control" placeholder="Title" >
          </div>
          <div class="form-group">
              <label for="">Location</label>
              <textarea type="text" name="location" class="form-control" placeholder="Location" >{{ $screening->location }}</textarea>
          </div>

          <div class="form-group">
              <label for="">Date Detail</label>
              <input type="text" name="date" value="{{ $screening->date }}" class="form-control" placeholder="Date Detail" >
          </div>
          <div class="form-group">
              <label for="">Date</label>
              <input type="datetime-local" name="created_at"  value="{{ $screening->created_at->format('Y-m-d\Th:m') }}" class="form-control" id="created_at" placeholder="Date" >
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
