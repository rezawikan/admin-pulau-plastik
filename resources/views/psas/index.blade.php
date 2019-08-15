@extends('adminlte::page')

@section('title', 'PSAs')

@section('content')
  <a href="{{ route('psas.create') }}" class="btn btn-primary">Create Psas</a>
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
      @foreach ($psas as $psa)
        <tr>
          <td> <img src="{{ config('app.url').$psa->image }}" style="height:50px;" alt=""></td>
          <td><a href="{{ $psa->link }}">{{ $psa->link }}</a></td>
          <td>{{ $psa->order }}</td>
          <td>
            <form class="" action="{{ route('psas.destroy', ['id' => $psa->id]) }}" method="POST">
              {{ csrf_field() }}
              {{ method_field('DELETE') }}
            <a href="{{ route('psas.edit',['id' => $psa->id]) }}" class="btn btn-primary btn-xs">Edit</a>
            <input type="submit" value="Delete"class="btn btn-primary btn-xs js-submit-confirm data" data-confirm-message="You will be delete distribution target {{strtolower($psa->id)}}">
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
            {{ $psas->appends(request()->query())->links() }}
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
