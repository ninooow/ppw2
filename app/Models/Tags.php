<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tags extends Model
{
    use HasFactory;

    protected $fillable = ['name_tag'];

    public function reviews()
    {
        return $this->belongsToMany(Reviews::class, 'review_tag', 'tag_id', 'review_id');
    }
}
