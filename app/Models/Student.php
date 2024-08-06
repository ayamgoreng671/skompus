<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Student extends Model
{
    use HasFactory, SoftDeletes;

    
    protected $fillable = [
        "nis",
        "name",
        "email",
        "phone",
    ];

    public function borrows(){
        return $this->hasMany(Borrow::class);
    }
}
