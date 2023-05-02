<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'score',
        'genre',
        'publisher',
        'release_date',
    ];

    public function news()
    {
        return $this->belongsTo(News::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public function reviews()
    {
        return $this->belongsTo(Review::class);
    }

}
