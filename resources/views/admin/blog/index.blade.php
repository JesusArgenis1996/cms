@extends('layouts.admin')
@section('contenido')

<ol class="breadcrumb">
    <li class="breadcrumb-item active">Listado de articulos</li>
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
                    </div>
                    <div class="col-lg-8">
                        <div class="card">
                            <div class="card-header">
                                <h5>LISTADO DE ARTICULOS</h5>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-12 form-group">
                                        <a href="{{route('create.blog')}}" type="button" class="btn btn-success">Registrar articulo</a>
                                    </div>
                                    <div class="col-lg-12">
                                        <table class="table table-sm">
                                            <thead class="thead-dark">
                                                <th>Imagen</th>
                                                <th>Titulo</th>
                                                <th>Opciones</th>
                                            </thead>
                                            @foreach($blog as $item)
                                                <tbody>
                                                    <th><img src="{{asset('blog/'.$item->imagen)}}" style="width:100px"></th>
                                                    <td>{{$item->titulo}}</td>
                                                    <td>
                                                    <div class="dropdown">
                                                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            <i class="fas fa-cog"></i>
                                                        </button>
                                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                            <a class="dropdown-item" 
                                                            data-toggle="modal" 
                                                            data-target="#modal-{{$item->id}}">
                                                            Eliminar</a>
                                                            <a class="dropdown-item" href="{{route('edit.blog',$item->id)}}">Editar</a>
                                                            
                                                        </div>
                                                        @include('admin.blog.modal')
                                                        </div>
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