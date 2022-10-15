<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    // allow Mass Assignment on the following fields
    protected $fillable = ['title', 'description'];

    // return publisher of the post

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
