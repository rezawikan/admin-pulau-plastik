@extends('adminlte::page')

@section('title', 'Episode')

@section('content')
  <a href="{{ route('episode.create') }}" class="btn btn-primary">Create Episode</a>
  <table class="table table-striped">
    <thead>
      <tr>
        <th scope="col">Title</th>
        <th scope="col">Summary</th>
        <th scope="col">Order</th>
        <th scope="col">Actions</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($episodes as $episode)
        <tr>
        <td>{{ substr($episode->title ?? 'null', 0, 15)  }} | {{ substr($episode->translate('id')->title ?? 'null', 0, 15) }}</td>
          <td>{{ substr($episode->summary, 0, 30) }}...</td>
          <td>{{ $episode->order }}</td>
          <td>
            <form class="" action="{{ route('episode.destroy', ['id' => $episode->id]) }}" method="POST">
              {{ csrf_field() }}
              {{ method_field('DELETE') }}
            <a href="{{ route('episode.edit',['id' => $episode->id]) }}" class="btn btn-primary btn-xs">Edit</a>
            <input type="submit" value="Delete"class="btn btn-primary btn-xs js-submit-confirm data" data-confirm-message="You will be delete distribution target {{strtolower($episode->title)}}">
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
            {{ $episodes->appends(request()->query())->links() }}
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
