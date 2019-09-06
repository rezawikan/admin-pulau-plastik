@component('mail::message')
{{ $greeting }}

<p><b>Nama</b><br>{{ $name }}</p>
<p><b>Email</b><br>{{ $email }}</p>
<p><b>No Telp</b><br>{{ $phone }}</p>
<p><b>Produk yang di pesan</b><br>{{ $product }}</p>
<p><b>Jumlah</b><br>{{ $numbers }}</p>
<p><b>Catatan</b><br>{{ $additional }}</p>

Thanks,<br>
{{ config('app.name') }}
@endcomponent
