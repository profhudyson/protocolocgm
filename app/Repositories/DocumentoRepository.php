<?php

namespace App\Repositories;

use App\Models\Documento;
use InfyOm\Generator\Common\BaseRepository;

class DocumentoRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'numero',
        'ano',
        'data_doc',
        'assunto',
        'tipo_doc',
        'int_ext',
        'origem',
        'org_ext'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Documento::class;
    }
}
