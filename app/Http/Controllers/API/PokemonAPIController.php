<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreatePokemonAPIRequest;
use App\Http\Requests\API\UpdatePokemonAPIRequest;
use App\Models\Pokemon;
use App\Repositories\PokemonRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class PokemonController
 * @package App\Http\Controllers\API
 */

class PokemonAPIController extends AppBaseController
{
    /** @var  PokemonRepository */
    private $pokemonRepository;

    public function __construct(PokemonRepository $pokemonRepo)
    {
        $this->pokemonRepository = $pokemonRepo;
    }

    /**
     * Display a listing of the Pokemon.
     * GET|HEAD /pokemon
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $pokemon = $this->pokemonRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($pokemon->toArray(), 'Pokemon retrieved successfully');
    }

    /**
     * Store a newly created Pokemon in storage.
     * POST /pokemon
     *
     * @param CreatePokemonAPIRequest $request
     *
     * @return Response
     */
    public function store(CreatePokemonAPIRequest $request)
    {
        $input = $request->all();

        $pokemon = $this->pokemonRepository->create($input);

        return $this->sendResponse($pokemon->toArray(), 'Pokemon saved successfully');
    }

    /**
     * Display the specified Pokemon.
     * GET|HEAD /pokemon/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Pokemon $pokemon */
        $pokemon = $this->pokemonRepository->find($id);

        if (empty($pokemon)) {
            return $this->sendError('Pokemon not found');
        }

        return $this->sendResponse($pokemon->toArray(), 'Pokemon retrieved successfully');
    }

    /**
     * Update the specified Pokemon in storage.
     * PUT/PATCH /pokemon/{id}
     *
     * @param int $id
     * @param UpdatePokemonAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePokemonAPIRequest $request)
    {
        $input = $request->all();

        /** @var Pokemon $pokemon */
        $pokemon = $this->pokemonRepository->find($id);

        if (empty($pokemon)) {
            return $this->sendError('Pokemon not found');
        }

        $pokemon = $this->pokemonRepository->update($input, $id);

        return $this->sendResponse($pokemon->toArray(), 'Pokemon updated successfully');
    }

    /**
     * Remove the specified Pokemon from storage.
     * DELETE /pokemon/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Pokemon $pokemon */
        $pokemon = $this->pokemonRepository->find($id);

        if (empty($pokemon)) {
            return $this->sendError('Pokemon not found');
        }

        $pokemon->delete();

        return $this->sendSuccess('Pokemon deleted successfully');
    }
}
