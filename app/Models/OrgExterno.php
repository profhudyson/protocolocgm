<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class OrgExterno
 * @package App\Models
 * @version June 2, 2017, 2:39 pm UTC
 */
class OrgExterno extends Model
{

    public $table = 'org_externo';
    
    public $timestamps = false;



    public $fillable = [
        'descricao'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'descricao' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function documentos()
    {
        return $this->hasMany(\App\Models\Documento::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function tramitacaos()
    {
        return $this->hasMany(\App\Models\Tramitacao::class);
    }
}
