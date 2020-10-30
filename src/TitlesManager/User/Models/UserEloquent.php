<?php

namespace App\TitlesManager\User\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Laravel\Passport\HasApiTokens;

/**
 * Class User
 * @property integer id
 * @property string name
 * @property string email
 * @package App\Models
 */
class UserEloquent extends Authenticatable
{
    use HasFactory, Notifiable, HasApiTokens;

    const USER_TOKEN_NAME = 'catalog_user';

    protected $table = 'users';

    public function getAuthIdentifier()
    {
        return $this->getKey();
    }

    public function getAuthPassword()
    {
        return $this->password;
    }

    public function setPasswordAttribute(string $password) {
        $this->attributes['password'] = Hash::make($password);
    }

    public function comparePasswordHash(string $password) {
        return Hash::check($password, $this->getAuthPassword());
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'country_id',
        'language_id',
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
}
