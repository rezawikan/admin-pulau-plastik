@extends('adminlte::page')

@section('title', 'Testimony')

@section('content')
  <a href="{{ route('testimony.create') }}" class="btn btn-primary">Create Testimony</a>
  <table class="table table-striped">
    <thead>
      <tr>
        <th scope="col">Name</th>
        <th scope="col">Position</th>
        <th scope="col">Summary</th>
        <th scope="col">Order</th>
        <th scope="col">Actions</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($testimonies as $testimony)
        <tr>
          <td>{{ $testimony->name }}</td>
        <td>{{ substr($testimony->position ?? 'null', 0, 15)  }} | {{ substr($testimony->translate('id')->position ?? 'null', 0, 15) }}</td>
          <td>{{ substr($testimony->summary, 0, 30) }}...</td>
          <td>{{ $testimony->order }}</td>
          <td>
            <form class="" action="{{ route('testimony.destroy', ['id' => $testimony->id]) }}" method="POST">
              {{ csrf_field() }}
              {{ method_field('DELETE') }}
            <a href="{{ route('testimony.edit',['id' => $testimony->id]) }}" class="btn btn-primary btn-xs">Edit</a>
            <input type="submit" value="Delete"class="btn btn-primary btn-xs js-submit-confirm data" data-confirm-message="You will be delete distribution target {{strtolower($testimony->title)}}">
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
            {{ $testimonies->appends(request()->query())->links() }}
          </div>
        </td>
      </tr>
    </tfoot>
  </table>
@stop

@section('css')

@stop

@section('js')
<script>
    $(function() {
        $('#myTab li:first-child a').tab('show')
    })
</script>
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
@endpush
