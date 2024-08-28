<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Idea extends Model
{
    use HasFactory;


    protected $with = ['user:id,name,image', 'comments.user:id,name,image'];

    protected $withCount = ['likes'];

    /*
    $fillable is the opposite of $guarded. When using $guarded, we specify the attributes that we do not want to be mass assignable. 
    In contrast, with $fillable, we choose the attributes that we want to be mass assignable
    */

    protected $fillable = [
        'user_id',
        'idea'
    ];

    public function comments()
    {
        return $this->hasMany(Comment::class); // A idea can have many comments
    }

    public function user()
    {
        return $this->belongsTo(User::class); //A user can have many ideas
    }

    public function likes()
    {
        return $this->belongsToMany(User::class, 'idea_like')->withTimestamps();
    }

    public function liked(User $user)
    {
        return $this->likes()->where('user_id', $user->id)->exists();
    }

    public function scopeSearch($query, $search = '')
    {
        $query->where('idea', 'like', '%' .  $search . '%');
    }
}
