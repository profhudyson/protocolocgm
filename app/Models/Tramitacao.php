<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class Tramitacao
 * @package App\Models
 * @version June 20, 2017, 2:33 pm UTC
 */
class Tramitacao extends Model
{

    public $table = 'tramitacao';
    
    public $timestamps = false;



    public $fillable = [
        'data_tram',
        'origem',
        'destino',
        'id_usu',
        'tipo_tram',
        'despacho',
        'id_doc'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'origem' => 'integer',
        'destino' => 'integer',
        'id_usu' => 'integer',
        'tipo_tram' => 'string',
        'despacho' => 'string',
        'id_doc' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function usuario()
    {
        return $this->belongsTo(\App\Models\Usuario::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function departamento()
    {
        return $this->belongsTo(\App\Models\Departamento::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function orgExterno()
    {
        return $this->belongsTo(\App\Models\OrgExterno::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function documento()
    {
        return $this->belongsTo(\App\Models\Documento::class);
    }
}
