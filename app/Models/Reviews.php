<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reviews extends Model
{
    use HasFactory;

    protected $fillable = ['txt_review', 'books_id', 'users_id'];

    public function tags()
    {
        return $this->belongsToMany(Tags::class, 'review_tag', 'review_id', 'tag_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'users_id');  // Hubungkan dengan kolom 'users_id'
    }
}
