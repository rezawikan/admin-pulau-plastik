@component('mail::message')
{{ $greeting }}

<p><b>Nama</b><br>{{ $name }}</p>
<p><b>Email</b><br>{{ $email }}</p>
<p><b>No Telp</b><br>{{ $phone }}</p>
<p><b>Pesan</b><br>{{ $message }}</p>

Thanks,<br>
{{ config('app.name') }}
@endcomponent
