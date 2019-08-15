@extends('adminlte::page')

@section('title', 'Edit Testimony')

@section('content')
<ul class="nav nav-tabs" id="myTab" role="tablist">
    @foreach (config('translatable.locales') as $key => $value)
    <li class="nav-item">
        <a class="nav-link {{ $key == 0 ? 'active' : '' }}" id="{{ $value }}-tab" data-toggle="tab" href="#{{ $value }}" role="tab" aria-controls="home" aria-selected="true">{{ strtoupper($value) }}</a>
    </li>
    @endforeach
</ul>
<div class="tab-content">
    <form class="" action="{{ route('testimony.update',['id' => $testimony->id ]) }}" method="POST">
      @method('PUT')
      @csrf
      @foreach (config('translatable.locales') as $key => $value)
      <div class="tab-pane fade show active" id="{{ $value }}" role="tabpanel" aria-labelledby="{{ $value }}-tab">
          <div class="container">
              <div class="form-group">
                  <label for="title">Title</label>
                  <input type="text" value="{{  $testimony->translate($value)->position ?? null }}" name="{{ $value }}_position" class="form-control" id="{{ $value }}-title" placeholder="Position">
              </div>
              <div class="form-group">
                  <label for="">Content</label>
                  <textarea type="text" name="{{ $value }}_summary" class="form-control text-editor" id="{{ $value }}-summary" placeholder="Content" >{{ $testimony->translate($value)->summary ?? null }}</textarea>
              </div>
          </div>
      </div>
      @endforeach

      <div class="container">
        <div class="form-group">
            <label for="">Name</label>
            <input type="text" name="name"  value="{{ $testimony->name }}" class="form-control" id="name" placeholder="Link" >
        </div>
        <div class="form-group">
            <label for="">Order</label>
            <input type="integer" name="order"  value="{{ $testimony->order }}" class="form-control" id="order" placeholder="Order" >
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
    </form>
</div>
@stop

@section('css')

@stop

@section('js')
@stop


@push('css')
<style media="screen">
.fade {
    display: none !important;
}

.fade.in {
    display: block !important;
}

.tab-content {
  margin-top: 25px;
}
</style>
@endpush


@push('js')
  <script>
      $(function() {
          $('#myTab li:first-child a').tab('show')
      })
  </script>
@endpush
