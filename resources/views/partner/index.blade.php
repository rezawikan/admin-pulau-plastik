@extends('adminlte::page')

@section('title', 'The Partners')

@section('content')
  <a href="{{ route('partner.create') }}" class="btn btn-primary">Create Partner</a>
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
      @foreach ($partners as $partner)
        <tr>
          <td> <img src="{{ config('app.url').$partner->image }}" style="height:50px;" alt=""></td>
          <td><a href="{{ $partner->link }}">{{ $partner->link }}</a></td>
          <td>{{ $partner->order }}</td>
          <td>
            <form class="" action="{{ route('partner.destroy', ['id' => $partner->id]) }}" method="POST">
              {{ csrf_field() }}
              {{ method_field('DELETE') }}
            <a href="{{ route('partner.edit',['id' => $partner->id]) }}" class="btn btn-primary btn-xs">Edit</a>
            <input type="submit" value="Delete"class="btn btn-primary btn-xs js-submit-confirm data" data-confirm-message="You will be delete distribution target {{strtolower($partner->id)}}">
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
            {{ $partners->appends(request()->query())->links() }}
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
