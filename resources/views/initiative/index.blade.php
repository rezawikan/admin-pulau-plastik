@extends('adminlte::page')

@section('title', 'Initiative')

@section('content')
  <a href="{{ route('initiative.create') }}" class="btn btn-primary">Create Initiatives</a>
  <table class="table table-striped">
    <thead>
      <tr>
        <th scope="col">Title</th>
        <th scope="col">Content</th>
        <th scope="col">Translated</th>
        <th scope="col">Actions</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($initiatives as $initiative)
        <tr>
        <td>{{ substr($initiative->title ?? 'null', 0, 15)  }} | {{ substr($initiative->translate('id')->title ?? 'null', 0, 15) }}</td>
          <td>{{ substr($initiative->content, 0, 30) }}...</td>
          <td>{{ $initiative->hasTranslation('id') == 1 ? 'Available' : 'Not Available' }}</td>
          <td>
            <form class="" action="{{ route('initiative.destroy', ['id' => $initiative->id]) }}" method="POST">
              {{ csrf_field() }}
              {{ method_field('DELETE') }}
            <a href="{{ route('initiative.edit',['id' => $initiative->id]) }}" class="btn btn-primary btn-xs">Edit</a>
            <input type="submit" value="Delete"class="btn btn-primary btn-xs js-submit-confirm data" data-confirm-message="You will be delete distribution target {{strtolower($initiative->title)}}">
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
            {{ $initiatives->appends(request()->query())->links() }}
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
