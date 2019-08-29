@component('mail::message')
{{-- {{ $greeting }} --}}

{{-- Intro Lines --}}
@foreach ($introLines as $line)
{{ $line }}

@endforeach

Thanks,<br>
{{ config('app.name') }}
@endcomponent
