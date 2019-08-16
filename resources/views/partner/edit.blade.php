@extends('adminlte::page')

@section('title', 'Update The Partner')

@section('content')
  <div class="container">
      <form class="" action="{{ route('partner.update',['id' => $partner->id ]) }}" method="POST">
          @csrf
          @method('PUT')
          <div class="form-group">
              <label for="">Link</label>
              <input type="text" name="link" value="{{ $partner->link }}" class="form-control" placeholder="Link - Optional">
          </div>
          <div class="form-group">
              <label for="">Order</label>
              <input type="number" name="order" value="{{ $partner->order }}" class="form-control" placeholder="Order" >
          </div>
          <div class="form-group">
              <label for="">Partner Image</label>
              <div class="input-group">
                  <span class="input-group-btn">
                      <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
                          <i class="fa fa-picture-o"></i> Choose
                      </a>
                  </span>
                  <input id="thumbnail" value="{{ $partner->image }}" class="form-control" type="text" name="image">

              </div>
              <span>Please take/put image on the partner folder (scale 2:1)</span><br>
              <img id="holder" src="{{ config('app.url').$partner->image  }}" style="margin-top:15px;max-height:100px;">
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
<script src="{{ asset('vendor/laravel-filemanager/js/lfm.js') }}"></script>
<script>
    var route_prefix = "{{ url(config('lfm.url_prefix')) }}";
    $('#lfm').filemanager('image', {
        prefix: route_prefix
    });
</script>
@endpush
