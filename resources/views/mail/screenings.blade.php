@component('mail::message')
{{ $greeting }}

<p><b>Nama</b><br>{{ $name }}</p>
<p><b>Email</b><br>{{ $email }}</p>
<p><b>No Telp</b><br>{{ $phone }}</p>
<p><b>Komunitas/Institusi</b><br>{{ $community }}</p>
<p><b>Saya menyelenggarakan pemutaran sebagai</b><br>{{ $as }}</p>
<p><b>Tanggal pemutaran</b><br>{{ $date }} - {{ $time }}</p>
<p><b>Lokasi pemutaran</b><br>{{ $location }}</p>
<p><b>Perkiraan jumlah penonton</b><br>{{ $numbersOfAudience }}</p>
<p><b>Profil penonton</b><br>{{ $audienceProfile }}</p>
<p><b>Kisaran usia penonton</b><br>{{ $numbersOfAudience }}</p>
<p><b>Deskripsi kegiatan</b><br>{{ $eventDecription }}</p>
<p><b>Episode yang diinginkan</b><br>{{ $episode }}</p>
<p><b>Bagaimana Anda tahu tentang Pulau Plastik:</b><br>{{ $shortDescription_1 }}</p>
<p><b>Apakah ada hal lain yang ingin kamu sampaikan:</b><br>{{ $shortDescription_2 }}</p>

Thanks,<br>
{{ config('app.name') }}
@endcomponent
