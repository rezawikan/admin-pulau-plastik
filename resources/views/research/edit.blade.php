@extends('adminlte::page')

@section('title', 'Edit Research')

@section('content')
  <div class="container">
      <form class="" action="{{ route('research.update', ['id' => $research->id]) }}" method="POST">
          @method('PUT')
          @csrf
          <div class="form-group">
              <label for="title">Title</label>
              <input type="text" name="title" value="{{ $research->title}}" class="form-control" placeholder="Title" >
          </div>
          <div class="form-group">
              <label for="type">Type</label>
              <select class="form-control" name="type" value="{{ $research->type}}">
                <option>Please select</option>
                <option {{ $research->type == 1 ? 'selected': '' }}  value="1">Dokumen Regulasi/Kebijakan Pemerintah</option>
                <option {{ $research->type == 2 ? 'selected': '' }}  value="2">Penelitian Organisasi Independen</option>
                <option {{ $research->type == 3 ? 'selected': '' }}  value="3">Penelitian dari Sektor Swasta</option>
                <option {{ $research->type == 4 ? 'selected': '' }}  value="4">Jurnal Akademis</option>
              </select>
          </div>
          <div class="form-group">
              <label for="type">Lang</label>
              <select class="form-control" name="lang" value="{{ $research->lang}}">
                <option>Please select</option>
                <option {{ $research->lang == 1 ? 'selected': '' }} value="1">Indonesia</option>
                <option {{ $research->lang == 2 ? 'selected': '' }} value="2">English</option>
              </select>
          </div>
          <div class="form-group">
              <label for="">Document</label>
              <div class="input-group">
                  <span class="input-group-btn">
                      <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
                          <i class="fa fa-picture-o"></i> Choose
                      </a>
                  </span>
                  <input id="thumbnail" class="form-control" type="text" name="link" value="{{ $research->link}}">

              </div>
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
  <!-- CKEditor init -->
  <script src="//cdnjs.cloudflare.com/ajax/libs/ckeditor/4.5.11/ckeditor.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/ckeditor/4.5.11/adapters/jquery.js"></script>
  <script src="{{ asset('vendor/laravel-filemanager/js/lfm.js') }}"></script>
  <script>
      $(function() {
          $('#myTab li:first-child a').tab('show')
      })
  </script>
  <script>
      var route_prefix = "{{ url(config('lfm.url_prefix')) }}";
  </script>
  <script>
      $('.text-editor').ckeditor({
          height: 600,
          filebrowserImageBrowseUrl: route_prefix + '?type=Images',
          filebrowserImageUploadUrl: route_prefix + '/upload?type=Images&_token={{csrf_token()}}',
          filebrowserBrowseUrl: route_prefix + '?type=Files',
          filebrowserUploadUrl: route_prefix + '/upload?type=Files&_token={{csrf_token()}}'
      });

      $('#lfm').filemanager('image', {prefix: route_prefix});
  </script>
@endpush
