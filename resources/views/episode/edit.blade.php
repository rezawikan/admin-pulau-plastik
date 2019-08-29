@extends('adminlte::page')

@section('title', 'Edit Episode')

@section('content')
<ul class="nav nav-tabs" id="myTab" role="tablist">
    @foreach (config('translatable.locales') as $key => $value)
    <li class="nav-item">
        <a class="nav-link {{ $key == 0 ? 'active' : '' }}" id="{{ $value }}-tab" data-toggle="tab" href="#{{ $value }}" role="tab" aria-controls="home" aria-selected="true">{{ strtoupper($value) }}</a>
    </li>
    @endforeach
</ul>
<div class="tab-content">
    <form class="" action="{{ route('episode.update',['id' => $episode->id ]) }}" method="POST">
        @method('PUT')
        @csrf
        @foreach (config('translatable.locales') as $key => $value)
        <div class="tab-pane fade show active" id="{{ $value }}" role="tabpanel" aria-labelledby="{{ $value }}-tab">
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" value="{{  $episode->translate($value)->title ?? null }}" name="{{ $value }}_title" class="form-control" id="{{ $value }}-title" placeholder="Title">
            </div>
            <div class="form-group">
                <label for="">Summary</label>
                <textarea type="text" name="{{ $value }}_summary" class="form-control text-editor" id="{{ $value }}-summary" placeholder="Summary">{{ $episode->translate($value)->summary ?? null }}</textarea>
            </div>
        </div>
        @endforeach

        <div class="form-group">
            <label for="">Order</label>
            <input type="integer" name="order" value="{{ $episode->order }}" class="form-control" id="order" placeholder="Order" required>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@stop

@section('css')

@stop

@section('js')
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
<script>
    $(function() {
        $('#myTab li:first-child a').tab('show')
    })
</script>
@endpush
