<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Yajra\DataTables\Html\Options\Languages\Paginate;

/**
 * Class Pokemon
 * @package App\Models
 * @version March 19, 2021, 8:30 am UTC
 *
 * @property integer $id
 * @property string $identifier
 * @property integer $species_id
 * @property integer $height
 * @property integer $weight
 * @property integer $base_experience
 * @property integer $order
 * @property integer $is_default
 */
class Pokemon extends Model
{
    use HasFactory;

    public $timestamps = false;

    public $table = 'pokemon';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'id',
        'identifier',
        'species_id',
        'height',
        'weight',
        'base_experience',
        'order',
        'is_default'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'identifier' => 'string',
        'species_id' => 'integer',
        'height' => 'integer',
        'weight' => 'integer',
        'base_experience' => 'integer',
        'order' => 'integer',
        'is_default' => 'boolean'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'identifier' => 'required|string',
        'species_id' => 'required|integer',
        'height' => 'required|integer',
        'weight' => 'required|integer',
        'base_experience' => 'required|integer',
        'order' => 'required|integer',
        'is_default' => 'nullable|boolean'
    ];

    
}
