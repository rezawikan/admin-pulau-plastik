@extends('adminlte::page')

@section('title', 'The Team')

@section('content')
  <a href="{{ route('gallery.create') }}" class="btn btn-primary">Create Gallery</a>
  <table class="table table-striped">
    <thead>
      <tr>
        <th scope="col">Image</th>
        <th scope="col">Order</th>
        <th scope="col">Actions</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($galleries as $gallery)
        <tr>
          <td> <img src="{{ config('app.url').$gallery->image }}" style="height:50px;" alt=""></td>
          <td>{{ $gallery->order }}</td>
          <td>
            <form class="" action="{{ route('gallery.destroy', ['id' => $gallery->id]) }}" method="POST">
              {{ csrf_field() }}
              {{ method_field('DELETE') }}
            <a href="{{ route('gallery.edit',['id' => $gallery->id]) }}" class="btn btn-primary btn-xs">Edit</a>
            <input type="submit" value="Delete"class="btn btn-primary btn-xs js-submit-confirm data" data-confirm-message="You will be delete distribution target {{strtolower($gallery->name)}}">
            </form>
          </td>
          </td>
        </tr>
      @endforeach
    </tbody>
    <tfoot>
      <tr>
        <td colspan="5">
          <div class="text-center">
            {{ $galleries->appends(request()->query())->links() }}
          </div>
        </td>
      </tr>
    </tfoot>
  </table>
@stop

@section('css')

@stop

@section('js')
@stop


@push('css')

@endpush

@push('js')
@endpush
