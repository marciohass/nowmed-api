<?php
/**
 *
 * Tabela de usuários do sistema
 *
 * name varchar(255) NOT NULL
 * email varchar(255) NOT NULL unique
 * password varchar(255) NOT NULL
 * user_level enum('ADMIN', 'ORGANIZACAO', 'CLIENTE', 'PACIENTE')
 *
 */

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Tymon\JWTAuth\Contracts\JWTSubject;

use App\Models\Contacts;
use App\Models\UserServiceLocations;
use App\Models\ServiceLocations;


class User extends Authenticatable implements JWTSubject
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'user_level'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
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
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }

    public function Contacts()
    {
        return $this->hasMany(Contacts::class);
    }

    public function ServiceLocations()
    {
        return $this->belongsToMany(ServiceLocations::class, UserServiceLocations::class, 'servicelocation_id', 'user_id');
    }

}
