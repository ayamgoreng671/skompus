<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Book extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'author_id',
        'category_id',
        'publisher_id',
        "title",
        "isbn",
        "slug",
        "is_borrowed",
        "cover",
        "description",
        "release_date"

    ];

    public function author(){
        return $this->belongsTo(Author::class);
    }
    public function publisher(){
        return $this->belongsTo(Publisher::class);
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }
    public function borrows(){
        return $this->hasMany(Borrow::class);
    }
}
