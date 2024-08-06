<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Borrow extends Model
{
    use HasFactory, SoftDeletes;

    
    protected $fillable = [
        "student_id",
        "book_id",
        "borrow_date",
        "due_date",
    ];

    
    public function book(){
        return $this->belongsTo(Book::class);
    }
    public function student(){
        return $this->belongsTo(Student::class);
    }

    public function borrowReturns(){
        return $this->hasMany(BorrowReturn::class);
    }
}
