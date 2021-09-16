@extends('layouts.admin')
@section('contenido')

<ol class="breadcrumb">
    <li class="breadcrumb-item active"><a href="{{route('index.equipo')}}">Listado de personas</a> </li>
    <li class="breadcrumb-item active">Registro de personas</li>
</ol>
    <div class="container-fluid">
        <div id="ui-view">
            <div>
                <div class="row">
                    <div class="col-lg-8">
                        <form method="POST" action="{{route('update.equipo',$equipo->id)}}" role="form" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                            <div class="card">
                                <div class="card-header">
                                    <h5>EDICION DE PERSONAS</h5>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-lg-6 form-group">
                                            <input type="text" class="form-control" 
                                            placeholder="Nombre del empleado" name="nombres"
                                            value="{{$equipo->nombres}}">
                        
                                        </div>
                                        <div class="col-lg-6 form-group">
                                            <input type="text" class="form-control" 
                                            placeholder="Cargo" name="cargo"
                                            value="{{$equipo->cargo}}">
                        
                                        </div>
                                        <div class="col-lg-6 form-group">
                                            <input type="file" class="form-control" placeholder="Titulo de la entrada" name="imagen">
                                            <hr>
                                            <center><img src="{{asset('equipo/'.$equipo->imagen)}}" style="width:150px"></center>
                                        </div>
                                        
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Actualizar</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>
 
@endsection