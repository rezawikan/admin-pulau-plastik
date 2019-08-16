@extends('adminlte::page')

@section('title', 'Author')

@section('content')
  <a href="{{ route('author.create') }}" class="btn btn-primary">Create Author</a>
  <table class="table table-striped">
    <thead>
      <tr>
        <th scope="col">Name</th>
        <th scope="col">Actions</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($authors as $author)
        <tr>
          <td>{{ $author->name }}</td>
          <td>
            <form class="" action="{{ route('author.destroy', ['id' => $author->id]) }}" method="POST">
              {{ csrf_field() }}
              {{ method_field('DELETE') }}
            <a href="{{ route('author.edit',['id' => $author->id]) }}" class="btn btn-primary btn-xs">Edit</a>
            <input type="submit" value="Delete"class="btn btn-primary btn-xs js-submit-confirm data" data-confirm-message="You will be delete distribution target {{strtolower($author->name)}}">
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
            {{ $authors->appends(request()->query())->links() }}
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
