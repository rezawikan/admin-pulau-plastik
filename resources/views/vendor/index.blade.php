@extends('adminlte::page')

@section('title', 'Vendor')

@section('content')
  <a href="{{ route('vendor.create') }}" class="btn btn-primary">Create Vendor</a>
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
      @foreach ($vendors as $vendor)
        <tr>
          <td>{{ substr($vendor->title ?? 'null', 0, 15)  }} | {{ substr($vendor->translate('id')->title ?? 'null', 0, 15) }}</td>
          <td>{{ substr($vendor->summary ?? 'null', 0, 15)  }} | {{ substr($vendor->translate('id')->summary ?? 'null', 0, 15) }}</td>
          <td>{{ $vendor->hasTranslation('id') == 1 ? 'Available' : 'Not Available' }}</td>
          <td>
            <form class="" action="{{ route('vendor.destroy', ['id' => $vendor->id]) }}" method="POST">
              {{ csrf_field() }}
              {{ method_field('DELETE') }}
            <a href="{{ route('vendor.edit',['id' => $vendor->id]) }}" class="btn btn-primary btn-xs">Edit</a>
            <input type="submit" value="Delete"class="btn btn-primary btn-xs js-submit-confirm data" data-confirm-message="You will be delete distribution target {{strtolower($vendor->title)}}">
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
            {{ $vendors->appends(request()->query())->links() }}
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
