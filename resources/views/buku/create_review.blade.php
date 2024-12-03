@extends('layout.master')
@section('content')
<div class="container">
    <h4 class="mt-5">Tambah Reviu</h4>
    @if(count($errors)>0)
        <ul class="alert alert-danger">
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    @endif
    <form action="{{ route('reviews.store') }}" method="POST">
        @csrf
        <div class="form-group row mt-3">
            <label for="colFormLabelLg" class="col-sm-2 col-form-label col-form-label-lg">Judul</label>
            <div class="col-sm-10">
                <select name="books_id" id="books_id" class="form-control" required>
                    @foreach($books as $book)
                        <option value="{{ $book->id }}">{{ $book->judul }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-group row mt-3">
            <label for="colFormLabelLg" class="col-sm-2 col-form-label col-form-label-lg">Text Reviu</label>
            <div class="col-sm-10">
                <textarea name="txt_review" id="txt_review" class="form-control form-control-lg" rows="5" placeholder="Masukkan Reviu..." required></textarea>
            </div>
        </div>
        <div class="form-group row mt-3">
            <label for="colFormLabelLg" class="col-sm-2 col-form-label col-form-label-lg">Tag</label>
            <div class="col-sm-10">
                <input type="text" name="tags" class="form-control form-control-lg"  placeholder="Tambahkan Tag" multiple required>
                <script>
                    var input = document.querySelector('#tags');
                    var tagify = new Tagify(input);
                </script>
            </div>
        </div>
        <div class="form-group row mt-5 justify-content-between">
            <a href="{{'/buku'}}" class="col-sm-2 btn btn-warning">Kembali</a>
            <button type="submit" class="col-sm-2 btn btn-primary">Simpan</button>
        </div>
        
    </form>
</div>
@endsection