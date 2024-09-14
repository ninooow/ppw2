<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Toko Buku</title>
</head>
<body class="bg-light">
    <h1 class="text-center pt-2 pb-3 text-dark fs-2 fw-bold">Daftar Buku yang Tersedia</h1>
    <table class="table table-secondary table-hover table-striped">
        <thead>
            <tr>
                <th class="ps-5 text-center">Nomor</th>
                <th class="text-center">Judul Buku</th>
                <th class="text-center">Penulis</th>
                <th class="pe-5 text-center">Harga</th>
                <th class="pe-5 text-center">Tanggal Terbit</th>
            </tr>
        </thead>
        <tbody>
        @php
        $no = 1;
        @endphp
        @foreach($data_buku as $index => $buku)
            <tr>
                <td class="ps-5 text-center">{{$no++}}</td>
                <td class="text-center">{{ $buku->judul }}</td>
                <td class="text-center">{{ $buku->penulis }}</td>
                <td class="text-center">{{ "Rp ".number_format($buku->harga, 2, ',', '.') }}</td>
                <td class="pe-5 text-center">{{ $buku->tgl_terbit->format('d/m/Y') }}</td>
            </tr>
        @endforeach
        </tbody>
        <tfoot>
            <tr>
                <td colspan="5" class="text-end pe-5"><b>Total Banyaknya Buku :</b> {{ $jumlah_buku }}</td>
            </tr>
            <tr>
                <td colspan="5" class="text-end pe-5"><b>Total Harga Buku :</b> {{"Rp ".number_format($total_harga, 2, ',', '.') }}</td>
            </tr>
        </tfoot>
    </table>
</body>
</html>