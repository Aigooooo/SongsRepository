<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Song extends Model
{
    use HasFactory;

    protected $table = 'song';

    protected $fillable =[
        'song_title',
        'author_name',
        'release_year'
    ];
}
