<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Toko Buku</title>
</head>
<body>
    <div class="container">
        <h4 class="mt-5">Tambah Buku</h4>
        <form method="post" action="{{ route('buku.update', $buku->id) }}">
            @csrf
            @method('PUT')
            <div class="form-group row mt-3">
                <label for="colFormLabelLg" class="col-sm-2 col-form-label col-form-label-lg">Judul</label>
                <div class="col-sm-10">
                    <input type="text" name="judul" class="form-control form-control-lg" id="judul" value="{{$buku->judul}}" placeholder="Judul">
                </div>
            </div>
            <div class="form-group row mt-3">
                <label for="colFormLabelLg" class="col-sm-2 col-form-label col-form-label-lg">Penulis</label>
                <div class="col-sm-10">
                    <input type="text" name="penulis" class="form-control form-control-lg" id="penulis" value="{{$buku->penulis}}" placeholder="Penulis">
                </div>
            </div>
            <div class="form-group row mt-3">
                <label for="colFormLabelLg" class="col-sm-2 col-form-label col-form-label-lg">Harga</label>
                <div class="col-sm-10">
                    <input type="text" name="harga" class="form-control form-control-lg" id="harga" value="{{$buku->harga}}" placeholder="Harga">
                </div>
            </div>
            <div class="form-group row mt-3">
                <label for="colFormLabelLg" class="col-sm-2 col-form-label col-form-label-lg">Tanggal Terbit</label>
                <div class="col-sm-10">
                    <input type="date" name="tgl_terbit" class="form-control form-control-lg" id="tanggal_terbit" value="{{$buku->tgl_terbit ? $buku->tgl_terbit->format('Y-m-d') : ''}}">
                </div>
            </div>
            <div class="form-group row mt-5 justify-content-between">
                <a href="{{'/buku'}}" class="col-sm-2 btn btn-warning">Kembali</a>
                <button type="submit" class="col-sm-2 btn btn-primary">Simpan</button>
            </div>
        </form>
    </div>
</body>
</html>