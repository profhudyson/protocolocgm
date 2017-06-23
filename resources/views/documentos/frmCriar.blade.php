<!-- Numero Field -->
<div class="form-group col-sm-6">
    {!! Form::label('numero', 'Número:') !!}
    {!! Form::text('numero', null, ['class' => 'form-control']) !!}
</div>

<!-- Ano Field -->
<div class="form-group col-sm-6">
    {!! Form::label('ano', 'Ano:') !!}
    {!! Form::number('ano', null, ['class' => 'form-control']) !!}
</div>

<!-- Data Doc Field -->
<div class="form-group col-sm-6">
    {!! Form::label('data_doc', 'Data do Documento:') !!}
    {!! Form::text('data_doc', null, ['class' => 'form-control date', 'data-provide' => 'datepicker']) !!}
</div>

<!-- Assunto Field -->
<div class="form-group col-sm-6">
    {!! Form::label('assunto', 'Assunto:') !!}
    {!! Form::text('assunto', null, ['class' => 'form-control']) !!}
</div>

<!-- Tipo Doc Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tipo_doc', 'Tipo do Documento:') !!}
    {!! Form::select('tipo_doc', array(1 => 'Ofício', 2 => 'Ofício Circular', 3 => 'Memorando', 4 => 'Memorando Circular', 5 => 'Carta', 6 => 'Convite', 7 => 'Ata', 8 => 'Atestado', 9 => 'Aviso', 10 => 'Decreto', 11 => 'Decreto-Lei', 12 => 'Despacho', 13 => 'Lei', 14 => 'Ordem de Serviço', 15 => 'Portaria', 16 => 'Requerimento'), null, ['class' => 'form-control', 'placeholder' => 'Selecione uma opção']) !!}
</div>

<!-- Int Ext Field -->
<div class="form-group col-sm-6">
    {!! Form::label('int_ext', 'Interno/Externo:') !!}
    {!! Form::select('int_ext', array('I' => 'Interno', 'E' => 'Externo'), null, ['class' => 'form-control', 'placeholder' => 'Selecione uma opção']) !!}
</div>

<!-- Origem Field -->
<div class="form-group col-sm-6 mostrarDepartamentos">
    {!! Form::label('origem', 'Origem:') !!}
    {!! Form::select('origem', $departamentos, null, ['class' => 'form-control', 'placeholder' => 'Selecione uma opção']) !!}
</div>

<!-- Org Ext Field -->
<div class="form-group col-sm-6 mostrarOrgExternos">
    {!! Form::label('org_ext', 'Órgão Externo:') !!}
    {!! Form::select('org_ext', $orgexterno, null, ['class' => 'form-control', 'placeholder' => 'Selecione uma opção']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Salvar', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('documentos.index') !!}" class="btn btn-default">Cancelar</a>
</div>

@section('scripts')
<script>
    $('.datepicker').datepicker();

    $('#data_doc').datepicker({
        format: 'dd/mm/yyyy',
        language: 'pt-BR',
        todayHighlight: true,
        autoclose: true,
        forceParse: false
    });

    $('#ano').datepicker({
        format: 'yyyy',
        language: 'pt-BR',
        autoclose: true,
        forceParse: false,
        startView: 2,
        minViewMode: 2,
        maxViewMode: 2
    });

    $(document).ready(function () {
        if ($('#int_ext').val() == "I") {
            $('.mostrarOrgExternos').hide();
            $('.mostrarDepartamentos').show();
        }
        else if ($('#int_ext').val() == "E") {
            $('.mostrarDepartamentos').hide();
            $('.mostrarOrgExternos').show();
        }
        else {
            $('.mostrarDepartamentos').hide();
            $('.mostrarOrgExternos').hide();
        }

    $('#int_ext').on('change', function () {
        if ($(this).val() == "I") {
            $('.mostrarOrgExternos').hide();
            $('.mostrarDepartamentos').show();
        }
        else if ($(this).val() == "E") {
            $('.mostrarDepartamentos').hide();
            $('.mostrarOrgExternos').show();
        }
    })
});
    </script>
@stop