<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BookCate extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = "book_cate";
    protected $fillable = [
        'name'
    ];
}
