<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    public function categories()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function users()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function comments()
    {
        // Relación corregida: usar 'post_id' como clave foránea
        return $this->hasMany(Comment::class, 'post_id');
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    protected $fillable = [
        'title',
        'body',
        'category_id',
        'user_id'
    ];
}
