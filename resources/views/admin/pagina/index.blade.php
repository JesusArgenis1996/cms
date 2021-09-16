@extends('layouts.admin')
@section('contenido')

<ol class="breadcrumb">
    <li class="breadcrumb-item active">Listado de paginas</li>
</ol>
    <div class="container-fluid">
        <div id="ui-view">
            <div>
                <div class="row">
                    <div class="col-lg-8">
                    @if(Session::has('success'))
                        <div class="alert alert-success alert-dismissible fade show mb-4 mt-4" role="alert">
                            {{Session::get('succes')}}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidde="true">$times;</span>
                            </button>
                        </div>
                    @endif
                        <div class="card">
                            <div class="card-header">
                                <h4>MIS PAGINAS</h4>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-12 form-group">
                                        <a href="{{route('create.pagina')}}" class="btn btn-primary">Registrar paginas</a>
                                        <a href="{{route('create.pagina')}}" 
                                        class="btn btn-primary" 
                                        data-toggle="modal" 
                                        data-target="#open-selector">Pagina de edicion</a>
                                        <!-- Modal -->
                                        <div class="modal fade" id="open-selector" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <form action="{{route('current_page',auth()->user()->id)}}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">SELECCIONAR PAGINA DE EDICION</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="row">
                                                        @if(!auth()->user()->current_page)
                                                            <div class="col-lg-12">
                                                                <div class="alert alert-danger" role="alert">
                                                                    No tiene asignada una apgina de edicion 
                                                                </div>
                                                            </div>    
                                                        @endif
                                                        <div class="col-lg-12">
                                                                <select name="current_page" class="form-control">
                                                                    @foreach($data_paginas as $item)
                                                                        @if($item->id == auth()->user()->current_page)
                                                                        <option selected value="{{$item->id}}">{{$item->dominio}}</option>
                                                                        @else
                                                                        <option value="{{$item->id}}">{{$item->dominio}}</option>
                                                                        @endif
                                                                        
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                                                    <button type="submit" class="btn btn-success">Seleccionar</button>
                                                </div>
                                                </div>
                                            </div>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <table class="table table-sm">
                                            <thead class="thead-dark">
                                                <th>Dominio</th>
                                                <th>Estado</th>
                                                <th>Opciones</th>
                                            </thead>
                                            @foreach($data_paginas as $item)
                                                <tbody>
                                                    <td>{{$item->dominio}}</td>
                                                    <td>
                                                        @if($item->estado == 'activo')
                                                        <span class="badge badge-success">{{$item->estado}}</span>
                                                        @else
                                                        <span class="badge badge-danger">Danger</span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                    <div class="dropdown">
                                                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            Opciones
                                                        </button>
                                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                            <a class="dropdown-item" 
                                                            data-toggle="modal" 
                                                            data-target="#modal-delete-{{$item->id}}">
                                                            Eliminar</a>
                                                            <a class="dropdown-item"
                                                            data-toggle="modal"
                                                            data-target="#open-{{$item->id}}">
                                                            Cambiar dominio</a>
                                                            <a class="dropdown-item"
                                                            targe="_blank"
                                                            href="http://127.0.0.1:8000/{{$item->dominio}}">
                                                            Ir a pagina</a>
                                                            <a class="dropdown-item"
                                                            href="{{route('change_theme')}}">
                                                            Cambiar plantilla</a>
                                                            
                                                        </div>
                                                        </div>
                                                        <!-- Modal -->
                                                        @include("admin.pagina.modal")
                                                        <div class="modal fade" id="open-{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                            <form method="POST" action="{{route('update.pagina', $item->id)}}">
                                                            @csrf
                                                            @method('update')
                                                                <div class="modal-dialog modal-dialog centerred" 
                                                                role="document">
                                                                    <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="exampleModalLabel">Cambiar nombre dominio</h5>
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <input name="_method" type="hidden"
                                                                        value="PUT">
                                                                        <div class="row">
                                                                            <div class="col-lg-12">
                                                                                <input type="text" class="form-control
                                                                                {{ $errors->has('dominio') ? '
                                                                                is-invalid' : '' }}" name="dominio"
                                                                                placeholder="Dominio de tu web" value="{{$item->dominio}}">
                                                                                @if($errors->has('dominio'))
                                                                                    <span class="invalid-feedback"
                                                                                    role="alert">
                                                                                    <strong>{{$errors->dba_first
                                                                                    ('dominio')}}</strong>
                                                                                    </span>
                                                                                @endif
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                                                        <button type="submit" class="btn btn-primary">Aceptar</button>
                                                                    </div>
                                                                    </div>
                                                                </div>
                                                            </form>
</div>

                                                    </th>
                                                    </td>
                                                </tbody>
                                            @endforeach
                                    </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
 
@endsection