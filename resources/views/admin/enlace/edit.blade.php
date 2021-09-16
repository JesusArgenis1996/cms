@extends('layouts.admin')
@section('contenido')

<ol class="breadcrumb">
    <li class="breadcrumb-item active"><a href="{{route('index.enlace')}}">Listado de enlaces</a> </li>
    <li class="breadcrumb-item active">Registro de enlaces</li>
</ol>
    <div class="container-fluid">
        <div id="ui-view">
            <div>
                <div class="row">
                    <div class="col-lg-8">
                        <form method="POST" action="{{route('update.enlace',$enlace->id)}}" role="form" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                            <div class="card">
                                <div class="card-header">
                                    <h5>EDICION DE ENLACE</h5>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        
                                        <div class="col-lg-6 form-group">
                                            <input type="text" class="form-control" 
                                            placeholder="Enlace" name="enlace"
                                            value="{{$enlace->enlace}}">
                        
                                        </div>
                                        <div class="col-lg-6 form-group">
                                            <input type="file" class="form-control" name="imagen">
                                            <hr>
                                            <center><img src="{{asset('enlace/'.$enlace->imagen)}}" style="width:150px"></center>
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