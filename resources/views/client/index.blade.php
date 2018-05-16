@extends('layouts/default')

@section('title')
Registro de Aplicaciones Clientes
@endsection

@section('content')
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Clientes</h1>        
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <form action="clients" method="GET" class="navbar-form navbar-right" id="search">
            <div class="input-group">
                <input type="text" name="search" class="form-control" placeholder="Buscar ..." value="{{Request::input('search')}}">

                <div class="input-group-btn">
                    <button class="btn btn-primary">
                         <span class="glyphicon glyphicon-search"></span>
                    </button>
                </div>
            </div>
        </form>
    </div>
    <div class="col-lg-12">
        
        <div class="panel panel-default">
            <div class="panel-heading">
                Lista de Clientes
                <div class="pull-right">
                    <div class="btn-group">
                        <a class="btn btn-success btn-xs" href="{{ url('clients/create/')}}"><i class="fa fa-plus"> Agregar</i></a>
                    </div>
                </div>
            </div>
            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                    <tr>
                        <th>@sortablelink('name','Nombre')</th>
                        <th>@sortablelink('description','Descripción')</th>
                        <th>Api Key</th>
                        <th>@sortablelink('status','Estatus')</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($clientes as $client)
                    <tr class="odd gradeX">
                        <td>{{ $client->name }}</td>
                        <td>{{ $client->description }}</td>
                        <td>{{ $client->api_key }}</td>
                        <td class="center">{{ $client->status }}</td>                        
                        <td class="center">
                            @if($client->id!='1')
                        	<a title="Editar" class="btn btn-warning" href="{{ url('clients/edit/'.$client->id) }}"><i class="fa fa-edit"></i></a>
                        	<a title="Eliminar" class="btn btn-danger" href="{{ url('clients/destroy/'.$client->id) }}"><i class="fa fa-trash"></i></a>
                        	<a title="Cambiar Estatus" class="btn btn-info" href="{{ url('clients/status/'.$client->id) }}"><i class="fa fa-ban"></i></a>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                    @if(sizeof($clientes)==0)
                    <tr class="odd gradeX">
                        <td colspan="5">No hay registros para el filtro: {{Request::input('search')}}</td>
                    </tr>
                    @endif
                </tbody>
            </table>
            <div class="box-footer">
		{!! $clientes->appends(\Request::except('page'))->render() !!}
            </div>
        </div>
        <!-- /.panel -->
    </div>
    <!-- /.col-lg-12 -->
</div>
@endsection