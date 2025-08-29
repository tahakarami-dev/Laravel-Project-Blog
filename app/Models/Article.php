<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

   // protected $with=['user','category'];

    protected $fillable = [
        'user_id',
        'category_id',
        'title',
        'body',
        'image',
    ];

    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
      return $this->belongsTo(User::class);
    }

    public function category(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function comments(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Comment::class);
    }
}
