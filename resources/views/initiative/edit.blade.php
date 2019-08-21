@extends('adminlte::page')

@section('title', 'Edit Initiative')

@section('content')
<ul class="nav nav-tabs" id="myTab" role="tablist">
    @foreach (config('translatable.locales') as $key => $value)
    <li class="nav-item">
        <a class="nav-link {{ $key == 0 ? 'active' : '' }}" id="{{ $value }}-tab" data-toggle="tab" href="#{{ $value }}" role="tab" aria-controls="home" aria-selected="true">{{ strtoupper($value) }}</a>
    </li>
    @endforeach
</ul>
<div class="tab-content">
    <form class="" action="{{ route('initiative.update',['id' => $initiative->id ]) }}" method="POST">
      @method('PUT')
      @csrf
      @foreach (config('translatable.locales') as $key => $value)
      <div class="tab-pane fade show active" id="{{ $value }}" role="tabpanel" aria-labelledby="{{ $value }}-tab">
          <div class="container">
              <div class="form-group">
                  <label for="title">Title</label>
                  <input type="text" value="{{  $initiative->translate($value)->title ?? null }}" name="{{ $value }}_title" class="form-control" id="{{ $value }}-title" placeholder="Title">
              </div>
              <div class="form-group">
                  <label for="">Content</label>
                  <textarea type="text" name="{{ $value }}_summary" class="form-control text-editor" id="{{ $value }}-summary" placeholder="Content" >{{ $initiative->translate($value)->summary ?? null }}</textarea>
              </div>
          </div>
      </div>
      @endforeach

      <div class="container">
        <div class="form-group">
            <label for="">Link</label>
            <input type="text" name="link"  value="{{ $initiative->link }}" class="form-control" id="created_at" placeholder="Link" >
        </div>
        <div class="form-group">
            <label for="">Thumbnail Image</label>
            <div class="input-group">
                <span class="input-group-btn">
                    <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
                        <i class="fa fa-picture-o"></i> Choose
                    </a>
                </span>
                <input id="thumbnail" value="{{ $initiative->image }}" class="form-control" type="text" name="image">
            </div>
            <img id="holder" src="{{ config('app.url').$initiative->image  }}" style="margin-top:15px;max-height:100px;">
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
