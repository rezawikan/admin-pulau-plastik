@extends('adminlte::page')

@section('title', 'Merchandise')

@section('content')
  <a href="{{ route('merchandise.create') }}" class="btn btn-primary">Create Merchandise</a>
  <table class="table table-striped">
    <thead>
      <tr>
        <th scope="col">Title</th>
        <th scope="col">Summary</th>
        <th scope="col">Translated</th>
        <th scope="col">Actions</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($merchandises as $merchandise)
        <tr>
          <td>{{ substr($merchandise->title ?? 'null', 0, 15)  }} | {{ substr($merchandise->translate('id')->title ?? 'null', 0, 15) }}</td>
          <td>{{ substr($merchandise->summary ?? 'null', 0, 15)  }} | {{ substr($merchandise->translate('id')->summary ?? 'null', 0, 15) }}</td>
          <td>{{ $merchandise->hasTranslation('id') == 1 ? 'Available' : 'Not Available' }}</td>
          <td>
            <form class="" action="{{ route('merchandise.destroy', ['id' => $merchandise->id]) }}" method="POST">
              {{ csrf_field() }}
              {{ method_field('DELETE') }}
            <a href="{{ route('merchandise.edit',['id' => $merchandise->id]) }}" class="btn btn-primary btn-xs">Edit</a>
            <input type="submit" value="Delete"class="btn btn-primary btn-xs js-submit-confirm data" data-confirm-message="You will be delete distribution target {{strtolower($merchandise->title)}}">
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
            {{ $merchandises->appends(request()->query())->links() }}
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
