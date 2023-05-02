<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'surname',
        'phone_number',
        'direction',
        'birth_date',
        'user_id',
    ];

    public function users()
    {
        return $this->hasOne(User::class);
    }
    
}
