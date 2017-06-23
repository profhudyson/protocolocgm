<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class Documento
 * @package App\Models
 * @version June 7, 2017, 12:26 pm UTC
 */
class Documento extends Model
{

    public $table = 'documento';
    
    public $timestamps = false;

    public $fillable = [
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
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'numero' => 'string',
        'ano' => 'integer',
        'data_doc' => 'date',
        'assunto' => 'string',
        'tipo_doc' => 'string',
        'int_ext' => 'string',
        'origem' => 'integer',
        'org_ext' => 'integer'
    ];



    /*public function getCreatedAtAttribute($date)
    {
        return Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $date)->format('Y-m-d');
    }

    public function getUpdatedAtAttribute($date)
    {
        return Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $date)->format('Y-m-d');
    }*/

    protected $dateFormat = 'd/m/Y';

    /**
     * Validation rules
     *
     * @var array
     */
    public static $regras = [
        'numero' => 'required|max:6',
        'ano' => 'required|min:4|max:4|date_format:Y',
        'data_doc' => 'required|date_format:d/m/Y',
        'assunto' => 'required',
        'tipo_doc' => 'required',
        'int_ext' => 'required'
    ];

    public static $mensagens = [
        'required' => 'O campo :attribute é obrigatório!',
        'min' => 'O campo :attribute deve ter no mínimo :min dígitos!',
        'max' => 'O campo :attribute deve ter no máximo :max dígitos!'
    ];

    public static $atributos = [
        'numero' => 'Número',
        'ano' => 'Ano',
        'data_doc' => 'Data do Documento',
        'assunto' => 'Assunto',
        'tipo_doc' => 'Tipo de Documento',
        'int_ext' => 'Interno/Externo'
    ];


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
    public function departamento()
    {
        return $this->belongsTo(\App\Models\Departamento::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function tramitacaos()
    {
        return $this->hasMany(\App\Models\Tramitacao::class);
    }
}
