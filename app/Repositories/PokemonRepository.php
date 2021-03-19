<?php

namespace App\Repositories;

use App\Models\Pokemon;
use App\Repositories\BaseRepository;

/**
 * Class PokemonRepository
 * @package App\Repositories
 * @version March 19, 2021, 8:30 am UTC
*/

class PokemonRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
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
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Pokemon::class;
    }
}
