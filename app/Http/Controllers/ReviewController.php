<?php
namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Reviews;
use App\Models\Tags;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    public function create()
    {
        $books = Buku::all();
        return view('buku.create_review', compact('books'));
    }

    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'books_id' => 'required|exists:books,id',
            'txt_review' => 'required|string',
            'tags' => 'required|string',
        ]);

        // Simpan review
        $review = Reviews::create([
            'books_id' => $request->books_id,
            'users_id' => auth()->id(),
            'txt_review' => $request->txt_review,
        ]);

        if ($request->has('tags')) {
            $tags = explode(',', $request->tags);
            foreach ($tags as $tagName) {
                $tagName = trim($tagName);
                $tag = Tags::firstOrCreate([
                    'name_tag' => $tagName, 
                ]);
                $review->tags()->attach($tag->id);
            }
        }
        return redirect('/buku')->with('success', 'Review berhasil disimpan!');
    }
}
