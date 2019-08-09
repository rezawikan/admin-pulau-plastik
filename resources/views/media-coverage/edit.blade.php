@extends('adminlte::page')

@section('title', 'Create Media Coverage')

@section('content')
<ul class="nav nav-tabs" id="myTab" role="tablist">
    @foreach (config('translatable.locales') as $key => $value)
    <li class="nav-item">
        <a class="nav-link {{ $key == 0 ? 'active' : '' }}" id="{{ $value }}-tab" data-toggle="tab" href="#{{ $value }}" role="tab" aria-controls="home" aria-selected="true">{{ strtoupper($value) }}</a>
    </li>
    @endforeach
</ul>
<div class="tab-content">
    <form class="" action="{{ route('media-coverage.update',['id' => $coverage->id ]) }}" method="POST">
      @method('PUT')
      @csrf
      @foreach (config('translatable.locales') as $key => $value)
      <div class="tab-pane fade show active" id="{{ $value }}" role="tabpanel" aria-labelledby="{{ $value }}-tab">
          <div class="container">
              <div class="form-group">
                  <label for="title">Title</label>
                  <input type="text" value="{{ $coverage->translate($value)->title ?? null }}" name="{{ $value }}_title" class="form-control" id="{{ $value }}-title" placeholder="Title">
              </div>
              <div class="form-group">
                  <label for="">Summary</label>
                  <textarea type="text" name="{{ $value }}_summary" class="form-control" id="{{ $value }}-content" placeholder="Content" >{{ $coverage->translate($value)->summary ?? null }}</textarea>
              </div>
          </div>
      </div>
      @endforeach

      <div class="container">
        <div class="form-group">
            <label for="">Media</label>
            <select name="media" class="custom-select form-control">
                <option selected>Select</option>
                @foreach ($media as $key => $medium)
                <option value="{{ $medium->id }}" {{ $coverage->media->id == $medium->id ? 'selected' : ''  }}>{{ $medium->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="">Link</label>
            <input type="text" value="{{ $coverage->link }}" name="link" class="form-control" id="link" placeholder="Link" >
        </div>
        <div class="form-group">
            <label for="">Date</label>
            <input type="datetime-local" name="created_at"  value="{{ $coverage->created_at->format('Y-m-d\Th:m') }}" class="form-control" id="created_at" placeholder="Date" >
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
  <script src="{{ asset('vendor/laravel-filemanager/js/lfm.js') }}"></script>
  <script>
      $(function() {
          $('#myTab li:first-child a').tab('show')
      })
      var route_prefix = "{{ url(config('lfm.url_prefix')) }}";
      $('#lfm').filemanager('image', {prefix: route_prefix});
  </script>
@endpush
