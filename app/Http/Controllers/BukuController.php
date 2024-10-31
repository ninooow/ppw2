<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use Illuminate\Http\Request;

class BukuController extends Controller
{
    public function __contstruct(){
        $this->middleware('auth');
    }
    public function search(Request $request){
        $batas = 5;
        $cari = $request->kata;
        $data_buku = Buku::where('judul','like',"%".$cari."%")->orwhere('penulis','like',"%".$cari."%")->paginate($batas);
        $jumlah_buku = $data_buku->count();
        $no = $batas * ($data_buku->currentPage()-1);
        return view('buku.search', compact('jumlah_buku', 'data_buku', 'no', 'cari'));
    }
    public function index(){
        $batas = 5;
        $jumlah_buku = Buku::count();
        $data_buku = Buku::orderBy('id','asc')->paginate($batas);
        $no= $batas*($data_buku->currentPage()-1);
        // $data_buku = Buku::all()->sortBy('judul');
        // $jumlah_buku = $data_buku->count();
        $total_harga = $data_buku->sum('harga');
        return view('buku.index', compact('data_buku', 'jumlah_buku', 'total_harga', 'no'));
    }

    public function create(){
        return view('buku.create');
    }

    public function store(Request $request){
        $this->validate($request,[
            'judul'=>'required|string',
            'penulis'=>'required|string|max:30',
            'harga'=>'required|numeric',
            'tgl_terbit'=>'required|date'
        ]);
        $buku = new Buku();
        $buku->judul = $request->judul;
        $buku->penulis = $request->penulis;
        $buku->harga = $request->harga;
        $buku->tgl_terbit = $request->tgl_terbit;
        $buku->save();

        return redirect('/buku')->with('pesanSimpan','Data Buku Berhasil disimpan ya kak');
    }
    public function destroy($id){
        $buku = Buku::find($id);
        $buku->delete();
        return redirect('/buku')->with('pesanHapus','Data Buku Berhasil dihapus ya kak');
    }

    public function edit($id){
        $buku = Buku::find($id);
        return view('buku.edit',compact('buku'));
    }
    public function update(Request $request,$id){
        $buku = Buku::find($id);
        $buku->judul = $request->judul;
        $buku->penulis = $request->penulis;
        $buku->harga = $request->harga;
        $buku->tgl_terbit = $request->tgl_terbit;
        $buku->save();
        
        return redirect('/buku')->with('pesanSimpan','Data Buku Berhasil disimpan ya kak');
    }
}
