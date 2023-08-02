<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\ChatMessage;
use App\Models\FoundPet;
use App\Models\LostPet;
use App\Models\UserProfile;
use App\Models\Like;


 
class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    // protected $fillable = [
    //     'name',
    //     'email',
    //     'password',
    // ];

    protected $guarded = [];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'password_confirmation',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
        'password_confirmation' =>'hashed',
    ];

    public function profile(){
    return $this->hasOne(UserProfile::class);
    }

    public function lostPets(){
    return $this->hasMany(LostPet::class);
    }
    
    public function foundPets(){
    return $this->hasMany(FoundPet::class);
    }

    public function sentMessages(){
    return $this->hasMany(ChatMessage::class, 'sender_id');
    }

    public function receivedMessages(){
    return $this->hasMany(ChatMessage::class, 'receiver_id');
    }

    public function lostPetComments()
    {
        return $this->hasMany(LostPetComment::class);
    }

    public function foundPetComments()
    {
        return $this->hasMany(FoundPetComment::class);
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }



}
