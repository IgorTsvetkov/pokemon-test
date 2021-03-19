<?php

namespace App\Http\Requests\API;

use App\Models\Pokemon;
use InfyOm\Generator\Request\APIRequest;

class UpdatePokemonAPIRequest extends APIRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = Pokemon::$rules;
        $rules['order'] = $rules['order'].",".$this->route("pokemon");
        return $rules;
    }
}
