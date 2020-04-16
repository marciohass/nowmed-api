<?php
/**
 *
 * Tabela auxiliar para inserir mais de um local de atendimento para um usuário
 *
 * location_id   bigInt(20) NOT NULL foreign_key service_locations
 * user_id              bigInt(20) NOT NULL foreign_key users
 *
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\User;
use App\Models\Locations;


class UserLocations extends Model
{
    protected $fillable = [
        'location_id',
        'user_id'
    ];

    public function User()
    {
        return $this->belongsTo(User::class);
    }

    public function ServiceLocations()
    {
        return $this->belongsTo(Locations::class);
    }

}
