@extends('adminlte::page')

@section('title', 'Media Coverage')

@section('content')
  <a href="{{ route('media-coverage.create') }}" class="btn btn-primary">Create Media Coverage</a>
  <table class="table table-striped">
    <thead>
      <tr>
        <th scope="col">Title</th>
        <th scope="col">Media</th>
        <th scope="col">Translated</th>
        <th scope="col">Actions</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($coverages as $coverage)
        <tr>
          <td>{{ substr($coverage->title ?? 'null', 0, 15)  }} | {{ substr($coverage->translate('id')->title ?? 'null', 0, 15) }}</td>
          <td>{{ $coverage->media->name }}</td>
          <td>{{ $coverage->hasTranslation('id') == 1 ? 'Available' : 'Not Available' }}</td>
          <td>
            <form class="" action="{{ route('media-coverage.destroy', ['id' => $coverage->id]) }}" method="POST">
              {{ csrf_field() }}
              {{ method_field('DELETE') }}
            <a href="{{ route('media-coverage.edit',['id' => $coverage->id]) }}" class="btn btn-primary btn-xs">Edit</a>
            <input type="submit" value="Delete"class="btn btn-primary btn-xs js-submit-confirm data" data-confirm-message="You will be delete distribution target {{strtolower($coverage->title)}}">
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
            {{ $coverages->appends(request()->query())->links() }}
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
