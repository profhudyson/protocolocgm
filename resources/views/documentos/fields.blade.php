<!-- Numero Field -->
<div class="form-group col-sm-6">
    {!! Form::label('numero', 'Numero:') !!}
    {!! Form::text('numero', null, ['class' => 'form-control']) !!}
</div>

<!-- Ano Field -->
<div class="form-group col-sm-6">
    {!! Form::label('ano', 'Ano:') !!}
    {!! Form::number('ano', null, ['class' => 'form-control']) !!}
</div>

<!-- Data Doc Field -->
<div class="form-group col-sm-6">
    {!! Form::label('data_doc', 'Data Doc:') !!}
    {!! Form::date('data_doc', null, ['class' => 'form-control']) !!}
</div>

<!-- Assunto Field -->
<div class="form-group col-sm-6">
    {!! Form::label('assunto', 'Assunto:') !!}
    {!! Form::text('assunto', null, ['class' => 'form-control']) !!}
</div>

<!-- Tipo Doc Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tipo_doc', 'Tipo Doc:') !!}
    {!! Form::text('tipo_doc', null, ['class' => 'form-control']) !!}
</div>

<!-- Int Ext Field -->
<div class="form-group col-sm-6">
    {!! Form::label('int_ext', 'Int Ext:') !!}
    {!! Form::text('int_ext', null, ['class' => 'form-control']) !!}
</div>

<!-- Origem Field -->
<div class="form-group col-sm-6">
    {!! Form::label('origem', 'Origem:') !!}
    {!! Form::number('origem', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('documentos.index') !!}" class="btn btn-default">Cancel</a>
</div>
