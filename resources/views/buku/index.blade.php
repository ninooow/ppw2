@extends('auth.layouts')

@section('content')
<body class="bg-light">
    @if(Session::has('pesanSimpan'))
        <div class="alert alert-success">{{Session::get('pesanSimpan')}}</div>
    @else
    @if(Session::has('pesanHapus'))
        <div class="alert alert-danger">{{Session::get('pesanHapus')}}</div>
    @else
        
    @endif
    @endif
    <?php $banyak_editorial_pick = 0;?>
    <div class="container text-center mt-5 mb-5">
        <h3>Buku Pilihan</h3>
        <div class="row g-3">
        @foreach($data_pick as $index => $buku)
            @if($buku->editorial_pick == True && $banyak_editorial_pick<=5)
                <div class="col-4">
                    <img class = "h-full w-full rounded-full object-cover object-center m-1" src="{{asset($buku->filepath)}}" alt=""/>
                    <p class="text-center">{{ $buku->judul }}</p>
                </div>
            <?php $banyak_editorial_pick=$banyak_editorial_pick+1;?>
            @endif
        @endforeach
        </div>
    </div>
    <h1 class="text-center pt-2 pb-3 text-dark fs-2 fw-bold">Daftar Buku yang Tersedia</h1>
    <div class="row">
    <form action="{{ route('buku.search') }}" method="get" >
        @csrf
        <div class="input-group mb-3" style="float: right; width: 30%;">
            <input type="text" name="kata" class="form-control" placeholder="Cari ..." aria-label="Search">
            <button class="btn btn-outline-secondary" type="submit">Search</button>
        </div>
    </form>
    </div>
    
    <table class="table table-secondary table-hover table-striped">
        <thead>
            <tr>
                <th class="ps-5 text-center">Nomor</th>
                <th class="text-center">Cover</th>
                <th class="text-center">Judul Buku</th>
                <th class="text-center">Penulis</th>
                <th class="pe-5 text-center">Harga</th>
                <th class="text-center">Tanggal Terbit</th>
                <th class="text-center">Reviu</th>
                @if (Auth::user()->level=='admin')
                    <th class="pe-5 text-center">Aksi</th>
                @endif
            </tr>
        </thead>
        <tbody>
        @php
        @endphp

        @foreach($data_buku as $index => $buku)
            <tr>
                <td class="ps-5 text-center">{{$buku->id}}</td>
                <td class="relative h-10 w-10">
                    <img class = "h-full w-full rounded-full object-cover object-center" src="{{asset($buku->filepath)}}" alt=""/>
                    <p class="text-break text-center">{{ $buku->keterangan }}</p>
                </td>
                <td class="text-center">{{ $buku->judul }}</td>
                <td class="text-center">{{ $buku->penulis }}</td>
                @if($buku->diskon==0)
                    <td class="text-center">{{ "Rp ".number_format($buku->harga, 0, ',', '.') }}</td>
                @else
                    <td class="text-center">
                        <p style="text-decoration: line-through; color:red">{{ "Rp ".number_format($buku->harga, 0, ',', '.') }}</p>
                        <p class="badge bg-success">{{ $buku->diskon}}%</p>
                        <?php $harga_diskon= $buku->harga - ($buku->harga * $buku->diskon)/100?>
                        <p class="fw-bold text-success">{{"Rp ".number_format($harga_diskon, 0, ',', '.')}}</p>
                    </td>
                @endif
                <td class="text-center">{{ $buku->tgl_terbit->format('d/m/Y') }}</td>
                <td class="text-start">
                    @foreach($buku->reviews as $review)
                        <blockquote class="blockquote text-start fs-6">
                            <p class="mb-0">{{ $review->txt_review }}</p>
                        </blockquote>
                        <p class="blockquote-footer">{{ $review->user->name }}</p>
                        @foreach($review->tags as $tag)
                            <span class="badge bg-primary">{{ $tag->name_tag}}</span>
                        @endforeach
                    @endforeach
                </td>
                @if (Auth::user()->level=='admin')
                    <td class="pe-5 text-center">
                        <form action="{{route('buku.destroy',$buku->id)}}" method="POST">
                            @csrf
                            <a class="btn btn-primary" href="{{route('buku.edit', $buku->id)}}" >Edit</a>
                            @method('DELETE')
                            <button onclick="return confirm('Yakin mau dihapus?')" type="submit" class="btn btn-danger">Hapus</button>
                        </form>
                    </td>
                @endif
            </tr>
        @endforeach
        </tbody>
        <tfoot>
            <tr>
                <td colspan="8" class="text-end pe-5"><b>Total Banyaknya Buku :</b> {{ $jumlah_buku }}</td>
            </tr>
            <tr>
                <td colspan="8" class="text-end pe-5"><b>Total Harga Buku :</b> {{"Rp ".number_format($total_harga, 2, ',', '.') }}</td>
            </tr>
        </tfoot>
    </table>
    <div>{{$data_buku->links('pagination::bootstrap-5')}}</div>
    @if (Auth::user()->level == 'admin' || Auth::user()->level == 'internal_reviewer')
    <a href="{{ route('reviews.create') }}" class="btn btn-primary float-end">Tambah Review</a>
    @endif

    @if (Auth::user()->level == 'admin')
        <a href="{{ route('buku.create') }}" class="btn btn-primary float-end">Tambah Buku</a>
    @endif
</body>
@endsection