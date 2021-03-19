<div class="table-responsive">
    <table class="table" id="pokemon-table">
        <thead>
            <tr>
                <th>Id</th>
        <th>Identifier</th>
        <th>Species Id</th>
        <th>Height</th>
        <th>Weight</th>
        <th>Base Experience</th>
        <th>Order</th>
        <th>Is Default</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($pokemon as $pokemon)
            <tr>
                <td>{{ $pokemon->id }}</td>
            <td>{{ $pokemon->identifier }}</td>
            <td>{{ $pokemon->species_id }}</td>
            <td>{{ $pokemon->height }}</td>
            <td>{{ $pokemon->weight }}</td>
            <td>{{ $pokemon->base_experience }}</td>
            <td>{{ $pokemon->order }}</td>
            <td>{{ $pokemon->is_default?"Yes":"No" }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['pokemon.destroy', $pokemon->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('pokemon.show', [$pokemon->id]) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('pokemon.edit', [$pokemon->id]) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-edit"></i>
                        </a>
                        {!! Form::button('<i class="far fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
