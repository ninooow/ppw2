    @extends('layout.master')
    @section('content')
    <div class="container">
        <h4 class="mt-5">Tambah Buku</h4>
        @if(count($errors)>0)
            <ul class="alert alert-danger">
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        @endif
        <form method="post" action="{{route('buku.store')}}">
            @csrf
            <div class="form-group row mt-3">
                <label for="colFormLabelLg" class="col-sm-2 col-form-label col-form-label-lg">Judul</label>
                <div class="col-sm-10">
                    <input type="text" name="judul" class="form-control form-control-lg" id="judul" placeholder="Judul">
                </div>
            </div>
            <div class="form-group row mt-3">
                <label for="colFormLabelLg" class="col-sm-2 col-form-label col-form-label-lg">Penulis</label>
                <div class="col-sm-10">
                    <input type="text" name="penulis" class="form-control form-control-lg" id="penulis" placeholder="Penulis">
                </div>
            </div>
            <div class="form-group row mt-3">
                <label for="colFormLabelLg" class="col-sm-2 col-form-label col-form-label-lg">Harga</label>
                <div class="col-sm-10">
                    <input type="text" name="harga" class="form-control form-control-lg" id="harga" placeholder="Harga">
                </div>
            </div>
            <div class="form-group row mt-3">
                <label for="colFormLabelLg" class="col-sm-2 col-form-label col-form-label-lg">Tanggal Terbit</label>
                <div class="col-sm-10">
                    <input type="date" name="tgl_terbit" class="form-control form-control-lg" id="tanggal_terbit">
                </div>
            </div>
            <div class="form-group row mt-5 justify-content-between">
                <a href="{{'/buku'}}" class="col-sm-2 btn btn-warning">Kembali</a>
                <button type="submit" class="col-sm-2 btn btn-primary">Simpan</button>
            </div>
            
        </form>
    </div>
    @endsection