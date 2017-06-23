<?php

namespace App\Repositories;

use App\Models\OrgExterno;
use InfyOm\Generator\Common\BaseRepository;

class OrgExternoRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'descricao'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return OrgExterno::class;
    }
}
