    @extends('layout.master')
    @section('content')
    <div class="container">
        <h4 class="mt-5">Edit Buku</h4>
        @if(count($errors)>0)
            <ul class="alert alert-danger">
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        @endif
        <form method="post" action="{{ route('buku.update', $buku->id) }}" enctype="multipart/form-data">
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
            <div class="form-group row mt-3">
                <label for="colFormLabelLg" class="col-sm-2 col-form-label col-form-label-lg">Keterangan</label>
                <div class="col-sm-10">
                    <textarea name="keterangan" class="form-control form-control-lg" id="keterangan">{{$buku->keterangan}}</textarea>
                </div>
            </div>
            <div class="form-group row mt-3">
                <label for="colFormLabelLg" class="col-sm-2 col-form-label col-form-label-lg">Diskon, masukkan angka saja!</label>
                <div class="col-sm-10">
                    <input type="number" name="diskon" class="form-control form-control-lg" id="diskon" min="0" max="100" value="{{$buku->diskon}}">
                </div>
            </div>
            <div class="col-span-full mt-6">
                @if ($buku->filepath != null)
                    <img src="{{ asset($buku->filepath) }}" alt="Gallery image" class="img-fluid rounded">
                @endif
                <label for="thumbnail" class="block text-sm font-medium leading-6 text-gray-900">Thumbnail</label>
                <div class="mt-2">
                    <input type="file" name="thumbnail" id="thumbnail">
                </div>
            </div>
            <div class="col-span-full mt-5">
                <label for="gallery" class="block text-sm font-medium leading-6 text-gray-900">Gallery</label>
                <div class="mt-2" id="fileinput_wrapper">
                </div>
                <div class="btn btn-dark">
                    <a id="tambah" onclick="addFileInput()">Tambah Data</a>
                </div>

                <script type="text/javascript">
                    function addFileInput() {
                        var div = document.getElementById('fileinput_wrapper');
                        div.innerHTML += '<input type="file" name="gallery[]" id="gallery" class="block w-full mb-5" style="margin-bottom:5px;">';
                    };
                </script>
            </div>
            @if($buku->galleries()->count() > 0)
                <div class="gallery_items mt-5">
                    @foreach($buku->galleries()->get() as $gallery)
                        <div class="gallery_item d-inline-block position-relative mr-3 mb-3">
                            <img src="{{ asset($gallery->path) }}" alt="Gallery image" class="img-fluid rounded">
                            <form action="{{ route('buku.deleteGalleryImage', ['buku' => $buku->id, 'gallery' => $gallery->id]) }}" method="POST" class="mt-2">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </div>
                    @endforeach
                </div>
            @endif

            <div class="form-group row mt-3">
                <label for="colFormLabelLg" class="col-sm-2 col-form-label col-form-label-lg">Editorial Pick</label>
                <div class="mt-2">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="editorial_pick" id="editorial_pick" value="1"{{ $buku->editorial_pick == '1' ? 'checked' : ''}}>
                        <label class="form-check-label" for="editorial_pick">Yes</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="editorial_pick" id="editorial_pick" value="0"{{ $buku->editorial_pick == '0' ? 'checked' : ''}}>
                        <label class="form-check-label" for="editorial_pick">No</label>
                    </div>
                </div>
            </div>
            <div class="form-group row mt-5 justify-content-between">
                <a href="{{'/buku'}}" class="col-sm-2 btn btn-warning">Kembali</a>
                <button type="submit" class="col-sm-2 btn btn-primary">Simpan</button>
            </div>
        </form>
    </div>
    @endsection