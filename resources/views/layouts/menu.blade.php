<li class="{{ Request::is('departamentos*') ? 'active' : '' }}">
    <a href="{!! route('departamentos.index') !!}"><i class="fa fa-edit"></i><span>Departamentos</span></a>
</li>


<li class="{{ Request::is('orgExternos*') ? 'active' : '' }}">
    <a href="{!! route('orgExternos.index') !!}"><i class="fa fa-edit"></i><span>Órgãos Externos</span></a>
</li>

<li class="{{ Request::is('tramitacaos*') ? 'active' : '' }}">
    <a href="{!! route('tramitacaos.index') !!}"><i class="fa fa-edit"></i><span>Tramitações</span></a>
</li>

<li class="{{ Request::is('usuarios*') ? 'active' : '' }}">
    <a href="{!! route('usuarios.index') !!}"><i class="fa fa-edit"></i><span>Usuários</span></a>
</li>

<li class="{{ Request::is('documentos*') ? 'active' : '' }}">
    <a href="{!! route('documentos.index') !!}"><i class="fa fa-edit"></i><span>Documentos</span></a>
</li>
<li class="{{ Request::is('usuarios*') ? 'active' : '' }}">
    <a href="{!! route('usuarios.index') !!}"><i class="fa fa-edit"></i><span>Usuarios</span></a>
</li>

