<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Category;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'body',
        'picture',
    ];
   
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function categories()
    {
        return $this->BelongsToMany(Category::class);
    }
}
