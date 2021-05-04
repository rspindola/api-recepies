<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;
use App\Notifications\ResetPasswordNotification;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasApiTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'avatar', 'phone', 'origin',
        'status', 'gender',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Obtém um usuário pelo email
     *
     * @param string $email
     * @return User $user
     */
    public static function findByEmail($email)
    {
        return self::where('email', $email)->first();
    }


    /**
     * Send the password reset notification.
     *
     * @param  string  $token
     * @return void
     */
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ResetPasswordNotification($token));
    }

    /**
     * Get all of cards for the user.
     */
    public function cards()
    {
        return $this->hasMany(Card::class);
    }

    /**
     * Get all of cards for the user.
     */
    public function recipes()
    {
        return $this->hasMany(Recipe::class);
    }

    /**
     * Get all of favorite recipes for the user.
     */
    public function favorites()
    {
        return $this->belongsToMany(Recipe::class, 'favorites', 'user_id', 'recipe_id');
    }
}
