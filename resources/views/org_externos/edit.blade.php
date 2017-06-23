@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Org Externo
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($orgExterno, ['route' => ['orgExternos.update', $orgExterno->id], 'method' => 'patch']) !!}

                        @include('org_externos.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection