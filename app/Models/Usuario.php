<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class Usuario
 * @package App\Models
 * @version June 21, 2017, 12:35 pm UTC
 */
class Usuario extends Model
{

    public $table = 'users';
    
    public $timestamps = false;



    public $fillable = [
        'name',
        'email',
        'password',
        'remember_token',
        'created_at',
        'updated_at',
        'id_dep'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'email' => 'string',
        'password' => 'string',
        'remember_token' => 'string',
        'id_dep' => 'integer'
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
    public function departamento()
    {
        return $this->belongsTo(\App\Models\Departamento::class);
    }
}
