<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FoundPetComment extends Model
{
    use HasFactory;

    protected $fillable = ['body', 'user_id', 'found_pet_id'];

    public function foundPet()
    {
        return $this->belongsTo(FoundPet::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
