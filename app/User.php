<?php
namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Auth\Notifications\ResetPassword;
use Hash;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use PHPOpenSourceSaver\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject
// class User extends Authenticatable
{
    use Notifiable, HasFactory;
    protected $fillable = ['surname','name', 'email','mobile','password',
     'role_id', 'username','position','admin','editing_village_id']; //'currency_id',
     protected $hidden = [
        'password',
        'remember_token',
    ];
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    

    // public function setPasswordAttribute($input)
    // {
    //     if ($input)
    //         $this->attributes['password'] = app('hash')->needsRehash($input) ? Hash::make($input) : $input;
    // }
    

    /**
     * Set to null if empty
     * @param $input
     */
    public function setRoleIdAttribute($input)
    {
        $this->attributes['role_id'] = $input ? $input : null;
    }
    
    public function role()
    {
        return $this->belongsTo(Role::class, 'role_id');
    }
    
    // public function currency()
    // {
    //     return $this->belongsTo(Currency::class, 'currency_id');
    // }
    
    public function sendPasswordResetNotification($token)
    {
       $this->notify(new ResetPassword($token));
    }

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }

    public function tweets()
    {
        return $this->hasMany(Tweet::class);
    }

    public function retweets()
    {
        return $this->hasMany(Retweet::class);
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    public function following()
    {
        return $this->belongsToMany(User::class, 'follows', 'follower_id', 'following_id');
    }

    public function followers()
    {
        return $this->belongsToMany(User::class, 'follows', 'following_id', 'follower_id');
    }
    
}
