@extends('layouts.admin')
@section('contenido')

<ol class="breadcrumb">
    <li class="breadcrumb-item active">Seccion Dos</li>
</ol>
    <div class="container-fluid">
        <div id="ui-view">
            <form method="POST" role="form" action="{{route('update.seccion_dos',$seccion->id)}}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
                <div class="row">
                    <div class="col-lg-8">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif                                 
                    </div>
                    <div class="col-lg-8">
                        <div class="card">
                            <div class="card-header">
                                <h5>DATOS DE SECCION DOS</h5>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-12 form-group">
                                        <input type="text" placeholder="Titulo de la seccion uno" 
                                        name="titulo" class="form-control"
                                        value="{{$seccion->titulo}}">
                                    </div>
                                    <div class="col-lg-12 form-group">
                                        <textarea name="descripcion" id="editor">{{$seccion->descripcion}}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-header">
                                <h5>IMAGEN</h5>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-12 form-group">
                                        <input type="file" class="form-control" name="imagen">
                                    </div>
                                    <div class="col-lg-12 form-group">
                                        <img src="{{asset('secciones/'.$seccion->imagen)}}" style="width: 100% !important">
                                    </div>
                                    <div class="col-lg-12 form-group">
                                        <button type="submit" class="btn btn-success btn-block">Actualizar</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </form>
        </div>
    </div>
</div>
 
@endsection