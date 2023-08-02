<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\LostPetComment;
use App\Models\like;

class LostPet extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function user(){
    return $this->belongsTo(User::class);
    }

    public function lostPetComments()
    {
        return $this->hasMany(LostPetComment::class);
    }

    public function likes()
    {
        return $this->morphMany(Like::class, 'likeable');
    }
}
