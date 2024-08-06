<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BorrowReturn extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        "borrow_id",
        "return_date"
    ];

    public function borrow()
    {
        return $this->belongsTo(Borrow::class);
    }
}
