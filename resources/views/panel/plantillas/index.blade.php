@extends('layouts.admin')
@section('contenido')

<ol class="breadcrumb">
    <li class="breadcrumb-item active">Listado de plantillas</li>
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
                                <h4>LISTADO DE PLANTILLAS</h4>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-12 form-group">
                                        <a href="{{route('create.plantilla')}}" class="btn btn-primary">Registrar plantilla</a>
                                    </div>
                                    <div class="col-lg-12">
                                        <table class="table table-sm">
                                            <thead class="thead-dark">
                                                <th>Portada</th>
                                                <th>Titulo</th>
                                                <th>Opciones</th>
                                            </thead>
                                            @foreach ($data_plantillas as $item)
                                                <tbody>
                                                    <td><img src="{{asset('portadas/'.$item->portada)}}" 
                                                        style="width:100px"></td>
                                                    <td>{{$item->titulo}}</td>
                                                    <th>
                                                    <div class="dropdown">
                                                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            Opciones
                                                        </button>
                                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                            <a class="dropdown-item" 
                                                            data-toggle="modal" 
                                                            data-target="#modal-{{$item->id}}">
                                                            Eliminar</a>
                                                            <a class="dropdown-item" 
                                                            href="{{URL::action([App\Http\Controllers\PlantillaController::class, 'edit'], $item->id)}}">
                                                            Editar</a>
                                                            <a class="dropdown-item" href="#">
                                                            Something else here</a>
                                                            
                                                        </div>
                                                        </div>
                                                       @include("panel.plantillas.modal")
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