<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePokemonRequest;
use App\Http\Requests\UpdatePokemonRequest;
use App\Repositories\PokemonRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class PokemonController extends AppBaseController
{
    /** @var  PokemonRepository */
    private $pokemonRepository;

    public function __construct(PokemonRepository $pokemonRepo)
    {
        $this->pokemonRepository = $pokemonRepo;
    }

    /**
     * Display a listing of the Pokemon.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $pokemon = $this->pokemonRepository->paginate(10);

        return view('pokemon.index')
            ->with('pokemon', $pokemon);
    }

    /**
     * Show the form for creating a new Pokemon.
     *
     * @return Response
     */
    public function create()
    {
        return view('pokemon.create');
    }

    /**
     * Store a newly created Pokemon in storage.
     *
     * @param CreatePokemonRequest $request
     *
     * @return Response
     */
    public function store(CreatePokemonRequest $request)
    {
        $input = $request->all();

        $pokemon = $this->pokemonRepository->create($input);

        Flash::success('Pokemon saved successfully.');

        return redirect(route('pokemon.index'));
    }

    /**
     * Display the specified Pokemon.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $pokemon = $this->pokemonRepository->find($id);

        if (empty($pokemon)) {
            Flash::error('Pokemon not found');

            return redirect(route('pokemon.index'));
        }

        return view('pokemon.show')->with('pokemon', $pokemon);
    }

    /**
     * Show the form for editing the specified Pokemon.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $pokemon = $this->pokemonRepository->find($id);

        if (empty($pokemon)) {
            Flash::error('Pokemon not found');

            return redirect(route('pokemon.index'));
        }

        return view('pokemon.edit')->with('pokemon', $pokemon);
    }

    /**
     * Update the specified Pokemon in storage.
     *
     * @param int $id
     * @param UpdatePokemonRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePokemonRequest $request)
    {
        $pokemon = $this->pokemonRepository->find($id);

        if (empty($pokemon)) {
            Flash::error('Pokemon not found');

            return redirect(route('pokemon.index'));
        }

        $pokemon = $this->pokemonRepository->update($request->all(), $id);

        Flash::success('Pokemon updated successfully.');

        return redirect(route('pokemon.index'));
    }

    /**
     * Remove the specified Pokemon from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $pokemon = $this->pokemonRepository->find($id);

        if (empty($pokemon)) {
            Flash::error('Pokemon not found');

            return redirect(route('pokemon.index'));
        }

        $this->pokemonRepository->delete($id);

        Flash::success('Pokemon deleted successfully.');

        return redirect(route('pokemon.index'));
    }
}
