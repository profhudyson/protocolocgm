<?php

namespace App\Repositories;

use App\Models\Tramitacao;
use InfyOm\Generator\Common\BaseRepository;

class TramitacaoRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'data_tram',
        'origem',
        'destino',
        'id_usu',
        'tipo_tram',
        'despacho',
        'id_doc'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Tramitacao::class;
    }
}
