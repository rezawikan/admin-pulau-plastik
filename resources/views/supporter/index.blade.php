@extends('adminlte::page')

@section('title', 'Supporter')

@section('content')
  <a href="{{ route('supporter.create') }}" class="btn btn-primary">Create Supporter</a>
  <table class="table table-striped">
    <thead>
      <tr>
        <th scope="col">Image</th>
        <th scope="col">Link</th>
        <th scope="col">Order</th>
        <th scope="col">Actions</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($supporters as $supporter)
        <tr>
          <td> <img src="{{ config('app.url').$supporter->image }}" style="height:50px;" alt=""></td>
          <td><a href="{{ $supporter->link }}">{{ $supporter->link }}</a></td>
          <td>{{ $supporter->order }}</td>
          <td>
            <form class="" action="{{ route('supporter.destroy', ['id' => $supporter->id]) }}" method="POST">
              {{ csrf_field() }}
              {{ method_field('DELETE') }}
            <a href="{{ route('supporter.edit',['id' => $supporter->id]) }}" class="btn btn-primary btn-xs">Edit</a>
            <input type="submit" value="Delete"class="btn btn-primary btn-xs js-submit-confirm data" data-confirm-message="You will be delete distribution target {{strtolower($supporter->id)}}">
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
            {{ $supporters->appends(request()->query())->links() }}
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
