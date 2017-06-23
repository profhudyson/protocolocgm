<table class="table table-responsive" id="documentos-table">
    <thead>
        <th>Número</th>
        <th>Ano</th>
        <th>Data do Documento</th>
        <th>Assunto</th>
        <th>Tipo do Documento</th>
        <th>Interno/Externo</th>
        <th>Origem</th>
        <th>Órgão Externo</th>
        <th colspan="3">Ações</th>
    </thead>
    <tbody>
    @foreach($documentos as $documento)
        <tr>
            <td>{!! $documento->numero !!}</td>
            <td>{!! $documento->ano !!}</td>
            <td>{!! $documento->data_doc->format('d/m/Y') !!}</td>
            <td>{!! $documento->assunto !!}</td>
            @if($documento->tipo_doc == 1) 
                       <td><?php echo "Ofício";?></td>
     @elseif ($documento->tipo_doc == 2) 
        <td><?php echo "Ofício Circular"; ?></td>
     @elseif ($documento->tipo_doc == 3) 
       <td><?php echo "Memorando"; ?></td>
     @elseif ($documento->tipo_doc == 4) 
        <td><?php echo "Memorando Circular"; ?></td>
     @elseif ($documento->tipo_doc == 5) 
        <td><?php echo "Carta";?></td>
     @elseif ($documento->tipo_doc == 6) 
        <td><?php echo "Convite";?></td>
     @elseif ($documento->tipo_doc == 7) 
        <td><?php echo "Ata";?></td>
     @elseif ($documento->tipo_doc == 8) 
        <td><?php echo "Atestado";?></td>
     @elseif ($documento->tipo_doc == 9) 
        <td><?php echo "Aviso";?></td>
     @elseif ($documento->tipo_doc == 10)
        <td><?php echo "Decreto";?></td>
     @elseif ($documento->tipo_doc == 11) 
        <td><?php echo "Decreto-Lei";?></td>
     @elseif ($documento->tipo_doc == 12) 
        <td><?php echo "Despacho";?></td>
     @elseif ($documento->tipo_doc == 13) 
        <td><?php echo "Lei";?></td>
     @elseif ($documento->tipo_doc == 14) 
        <td><?php echo "Ordem de Serviço";?></td>
     @elseif ($documento->tipo_doc == 15) 
        <td><?php echo "Portaria";?></td>
     @else ($documento->tipo_doc == 16) 
        <td><?php echo "Requerimento";?></td>
        @endif
        @if ($documento->int_ext == 'E')
            <td><?php echo "Externo" ?> </td>
            @else ($documento->int_ext == 'I')
            <td><?php echo "Interno" ?> </td>
         @endif
            <td>{!! $documento->origem->select('descricao') !!}</td>
            <td>{!! $documento->org_ext !!}</td>
            <td>
                {!! Form::open(['route' => ['documentos.destroy', $documento->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('documentos.show', [$documento->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('documentos.edit', [$documento->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Tem certeza que deseja excluir esse documento?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>