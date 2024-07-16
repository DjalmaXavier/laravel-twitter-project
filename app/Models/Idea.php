<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Idea extends Model
{
    use HasFactory;

    /*
    $fillable is the opposite of $guarded. When using $guarded, we specify the attributes that we do not want to be mass assignable. 
    In contrast, with $fillable, we choose the attributes that we want to be mass assignable
    */

    protected $fillable = [
        'idea',
        'likes'
    ];

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
