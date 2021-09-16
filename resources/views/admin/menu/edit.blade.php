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
                            <form method="POST" action="{{route('update_item',$item->id)}}" role="form">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <div class="col-lg-12 form-group">  
                                <input type="hidden" value="{{$menu->id}}" name="id_menu">
                                    <div class="row">
                                        <div class="col-lg-12 form-group">
                                            <input type="text" class="form-control" placeholder="Enlace de menu"
                                            name="enlace" value="{{$item->enlace}}">
                                        </div>
                                        <div class="col-lg-5 form-group">
                                            <input type="text" class="form-control" placeholder="Titulo de menu"
                                            name="titulo" value="{{$item->titulo}}">
                                        </div>
                                        <div class="col-lg-5 form-group">
                                            <input type="text" class="form-control" placeholder="Icono de menu"
                                            name="icono" value="{{$item->icono}}">
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="col-lg-2 form-group">
                                    <button type="submit" class="btn btn-primary btn-block">Actualizar</button>
                                </div>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
 
@endsection