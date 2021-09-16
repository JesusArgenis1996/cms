@extends('layouts.admin')
@section('contenido')

<ol class="breadcrumb">
    <li class="breadcrumb-item active"><a href="{{route('index.entrada')}}">Listado de entradas</a> </li>
    <li class="breadcrumb-item active">Editar de entradas</li>
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
                        <form method="POST" action="{{route('update.entrada',$entrada->id)}}" role="form">
                        @csrf
                        @method('put')
                            <div class="card">
                                <div class="card-header">
                                    <h5>EDITAR ENTRADAS</h5>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-lg-12 form-group">
                                            <input type="text" 
                                            class="form-control" 
                                            placeholder="Titulo de la entrada" 
                                            name="titulo"
                                            value="{{$entrada->titulo}}">
                        
                                        </div>
                                        <div class="col-lg-12 form-group">
                                            <textarea name="contenido" id="editor">{{$entrada->contenido}}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Guardar</button>
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