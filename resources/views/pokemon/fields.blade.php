<!-- Id Field -->
{{-- <div class="form-group col-sm-6">
    {!! Form::label('id', 'Id:') !!}
    {!! Form::number('id', null, ['class' => 'form-control']) !!}
</div> --}}

<!-- Identifier Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('identifier', 'Identifier:') !!}
    {!! Form::text('identifier', null, ['class' => 'form-control']) !!}
</div>

<!-- Species Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('species_id', 'Species Id:') !!}
    {!! Form::number('species_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Height Field -->
<div class="form-group col-sm-6">
    {!! Form::label('height', 'Height:') !!}
    {!! Form::number('height', null, ['class' => 'form-control']) !!}
</div>

<!-- Weight Field -->
<div class="form-group col-sm-6">
    {!! Form::label('weight', 'Weight:') !!}
    {!! Form::number('weight', null, ['class' => 'form-control']) !!}
</div>

<!-- Base Experience Field -->
<div class="form-group col-sm-6">
    {!! Form::label('base_experience', 'Base Experience:') !!}
    {!! Form::number('base_experience', null, ['class' => 'form-control']) !!}
</div>

<!-- Order Field -->
<div class="form-group col-sm-6">
    {!! Form::label('order', 'Order:') !!}
    {!! Form::number('order', null, ['class' => 'form-control']) !!}
</div>

<!-- Is Default Field -->
<div class="form-group col-sm-6">
    {!! Form::label('is_default', 'Is Default:') !!}
    {!! Form::select('is_default', [0=>"No",1=>"Yes"],null ,['class' => 'custom-select']) !!}
</div>