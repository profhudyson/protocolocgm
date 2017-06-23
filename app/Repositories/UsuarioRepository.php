<?php

namespace App\Repositories;

use App\Models\Usuario;
use InfyOm\Generator\Common\BaseRepository;

class UsuarioRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'email',
        'password',
        'remember_token',
        'created_at',
        'updated_at',
        'id_dep'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Usuario::class;
    }
}
