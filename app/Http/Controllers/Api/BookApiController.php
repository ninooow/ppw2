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
}
