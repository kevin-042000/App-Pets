<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\like;
use App\Models\FoundPetComment;


class FoundPet extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function user(){
    return $this->belongsTo(User::class);
    }

    public function foundPetComments()
    {
    return $this->hasMany(FoundPetComment::class);
    }

    public function likes()
    {
        return $this->morphMany(Like::class, 'likeable');
    }


}
