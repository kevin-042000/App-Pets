<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LostPetComment extends Model
{
    use HasFactory;

    protected $fillable = ['body', 'user_id', 'lost_pet_id'];

public function lostPet()
{
    return $this->belongsTo(LostPet::class);
}

public function user()
{
    return $this->belongsTo(User::class);
}
}
