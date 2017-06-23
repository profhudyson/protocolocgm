<!-- Data Tram Field -->
<div class="form-group col-sm-6">
    {!! Form::label('data_tram', 'Data da Tramitação:') !!}
    {!! Form::text('data_tram', null, ['class' => 'form-control date', 'data-provide' => 'datepicker']) !!}
</div>

<!-- Origem Field -->
<div class="form-group col-sm-6">
    {!! Form::label('origem', 'Origem:') !!}
    {!! Form::number('origem', null, ['class' => 'form-control']) !!}
</div>

<!-- Destino Field -->
<div class="form-group col-sm-6">
    {!! Form::label('destino', 'Destino:') !!}
    {!! Form::number('destino', null, ['class' => 'form-control']) !!}
</div>

<!-- Id Usu Field -->
<div class="form-group col-sm-6">
    {!! Form::label('id_usu', 'Usuário:') !!}
    {!! Form::number('id_usu', null, ['class' => 'form-control']) !!}
</div>

<!-- Tipo Tram Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tipo_tram', 'Tipo de Tramitação:') !!}
    {!! Form::text('tipo_tram', null, ['class' => 'form-control']) !!}
</div>

<!-- Despacho Field -->
<div class="form-group col-sm-6">
    {!! Form::label('despacho', 'Despacho:') !!}
    {!! Form::text('despacho', null, ['class' => 'form-control']) !!}
</div>

<!-- Id Doc Field -->
<div class="form-group col-sm-6">
    {!! Form::label('id_doc', 'Documento:') !!}
    {!! Form::number('id_doc', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Salvar', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('tramitacaos.index') !!}" class="btn btn-default">Cancelar</a>
</div>

@section ('scripts')
    <script>
        $('.datepicker').datepicker();

        $('#data_tram').datepicker({
        format: 'dd/mm/yyyy',
        language: 'pt-BR',
        todayHighlight: true,
        autoclose: true,
        forceParse: false
    });
    </script>
@stop
