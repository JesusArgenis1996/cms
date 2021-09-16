@extends('layouts.admin')
@section('contenido')

<ol class="breadcrumb">
    <li class="breadcrumb-item active">Listado de usuarios</li>
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
                                <h4>LISTADO DE USUARIOS</h4>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    
                                    <div class="col-lg-12">
                                        <table class="table table-sm">
                                            <thead class="thead-dark">
                                                <th>Nombres</th>
                                                <th>Correos</th>
                                                <th>Opciones</th>
                                            </thead>
                                            @foreach ($users as $item)
                                                <tbody>
                                                    <td>{{$item->name}}</td>
                                                    <td>{{$item->email}}</td>
                                                    <th>
                                                    <div class="dropdown">
                                                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            Opciones
                                                        </button>
                                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                            <a class="dropdown-item" 
                                                            data-toggle="modal" 
                                                            data-target="#dominio-{{$item->id}}">
                                                            Ver Dominios</a>
                                                            
                                                        </div>
                                                        </div>
                                                        <!-- Modal -->
                                                        <div class="modal fade" id="dominio-{{$item->id}}" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
                                                                <button type="button" class="btn btn-close" data-dismiss="modal" aria-label="Close">X</button>
                                                            </div>
                                                            <div class="modal-body col-lg-12">
                                                                <div class="row">
                                                                    <div class="col-lg-12">
                                                                        <table class="table-table-sm">
                                                                            <thead class="thead-dark">
                                                                                <th>Dominio</th>
                                                                                <th>Ir</th>
                                                                            </thead>
                                                                            @foreach($dominios as $item_dominio)
                                                                                @if($item->id == $item_dominio->id_user)
                                                                                    <tr>
                                                                                        <td>{{$item_dominio->dominio}}</td>
                                                                                        <td><a class="btn btn-primary" href="http://127.0.0.1:8000/{{$item_dominio->dominio}}" target="_blank"></a></td>
                                                                                    </tr>
                                                                                @endif
                                                                            @endforeach
                                                                        </table>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                <button type="button" class="btn btn-primary">Understood</button>
                                                            </div>
                                                            </div>
                                                        </div>
                                                        </div>
                                                    </th>
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