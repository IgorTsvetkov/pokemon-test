<!-- Id Field -->
<div class="col-sm-12">
    {!! Form::label('id', 'Id:') !!}
    <p>{{ $pokemon->id }}</p>
</div>

<!-- Identifier Field -->
<div class="col-sm-12">
    {!! Form::label('identifier', 'Identifier:') !!}
    <p>{{ $pokemon->identifier }}</p>
</div>

<!-- Species Id Field -->
<div class="col-sm-12">
    {!! Form::label('species_id', 'Species Id:') !!}
    <p>{{ $pokemon->species_id }}</p>
</div>

<!-- Height Field -->
<div class="col-sm-12">
    {!! Form::label('height', 'Height:') !!}
    <p>{{ $pokemon->height }}</p>
</div>

<!-- Weight Field -->
<div class="col-sm-12">
    {!! Form::label('weight', 'Weight:') !!}
    <p>{{ $pokemon->weight }}</p>
</div>

<!-- Base Experience Field -->
<div class="col-sm-12">
    {!! Form::label('base_experience', 'Base Experience:') !!}
    <p>{{ $pokemon->base_experience }}</p>
</div>

<!-- Order Field -->
<div class="col-sm-12">
    {!! Form::label('order', 'Order:') !!}
    <p>{{ $pokemon->order }}</p>
</div>

<!-- Is Default Field -->
<div class="col-sm-12">
    {!! Form::label('is_default', 'Is Default:') !!}
    <p>{{ $pokemon->is_default }}</p>
</div>

