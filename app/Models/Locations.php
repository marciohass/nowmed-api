<?php
/**
 *
 * Tabela de endereços de antendimento do porfissional cadastrados
 *
 * name                 varchar(255) NOT NULL
 * zip_code             varchar(9) NOT NULL
 * street               varchar(255) NOT NULL
 * number               varchar(10) NOT NULL
 * district             varchar(255) NOT NULL
 * address_complemet    varchar(255) NULL
 * city                 varchar(255) NOT NULL
 * state                varchar(2) NOT NULL
 *
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\UserLocations;

class Locations extends Model
{
    protected $fillable = [
        'name',
        'zip_code',
        'street',
        'number',
        'district',
        'address_complement',
        'city',
        'state'
    ];

    public function UserServiceLocations()
    {
        return $this->belongsToMany(UserLocations::class);
    }
}
