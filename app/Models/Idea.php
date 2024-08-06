<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Idea extends Model
{
    use HasFactory;


    protected $with = ['user', 'comments.user'];

    /*
    $fillable is the opposite of $guarded. When using $guarded, we specify the attributes that we do not want to be mass assignable. 
    In contrast, with $fillable, we choose the attributes that we want to be mass assignable
    */

    protected $fillable = [
        'user_id',
        'idea',
        'likes'
    ];

    public function comments()
    {
        return $this->hasMany(Comment::class); // A idea can have many comments
    }

    public function user()
    {
        return $this->belongsTo(User::class); //A user can have many ideas
    }
}
