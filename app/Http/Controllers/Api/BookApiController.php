<?php

namespace App\Http\Controllers\Api;

//import model buku
use App\Models\Buku;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

//import resource PostResource
use App\Http\Resources\BookResource;

class BookApiController extends Controller
{
    public function index(){
        $books = Buku::latest()->paginate(5);
        return new BookResource(true,'List Data Buku', $books);
    }
    public function store(Request $request)
    {
        // Validasi data yang diterima
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'penulis' => 'required|string|max:255',
            'harga' => 'required|integer',
            'tgl_terbit' => 'required|date',
            'filename' => 'required|string',
            'filepath' => 'required|string',
        ]);

        // Menyimpan data ke database
        $book = Buku::create([
            'judul' => $validated['judul'],
            'penulis' => $validated['penulis'],
            'harga' => $validated['harga'],
            'tgl_terbit' => $validated['tgl_terbit'],
            'filename' => $validated['filename'],
            'filepath' => $validated['filepath'],
        ]);

        // Mengembalikan response
        return response()->json([
            'success' => true,
            'message' => 'Buku berhasil ditambahkan!',
            'data' => $book,
        ], 201); // Status 201 Created
    }
}
