@extends('adminlte::page')

@section('title', 'Media')

@section('content')
  <a href="{{ route('media.create') }}" class="btn btn-primary">Create Media</a>
  <table class="table table-striped">
    <thead>
      <tr>
        <th scope="col">Image</th>
        <th scope="col">Name</th>
        <th scope="col">Actions</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($media as $medium)
        <tr>
          <td> <img src="{{ config('app.url').$medium->image }}" style="height:50px;" alt=""></td>
          <td>{{ $medium->name }}</td>
          <td>
            <form class="" action="{{ route('media.destroy', ['id' => $medium->id]) }}" method="POST">
              {{ csrf_field() }}
              {{ method_field('DELETE') }}
            <a href="{{ route('media.edit',['id' => $medium->id]) }}" class="btn btn-primary btn-xs">Edit</a>
            <input type="submit" value="Delete"class="btn btn-primary btn-xs js-submit-confirm data" data-confirm-message="You will be delete distribution target {{strtolower($medium->name)}}">
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
            {{ $media->appends(request()->query())->links() }}
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
