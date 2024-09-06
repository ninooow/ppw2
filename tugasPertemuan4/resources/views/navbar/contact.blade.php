@extends('layout.home')
@section('title_page','Contact Me')
@section('content')
<p>Ini adalah halaman Kontak</p>
<table border="1">
    <tr>
        <td>Email</td>
        <td>:</td>
        <td><?=$email?></td>
    </tr>
    <tr>
        <td>Nomor HP</td>
        <td>:</td>
        <td><?=$nomor?></td>
    </tr>
    <tr>
        <td>Instagram</td>
        <td>:</td>
        <td><?=$instagram?></td>
    </tr>
</table>
@endsection