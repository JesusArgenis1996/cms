@extends('layouts.admin')
@section('contenido')

<ol class="breadcrumb">
    <li class="breadcrumb-item active"><a href="{{route('index.blog')}}">Listado de articulos</a> </li>
    <li class="breadcrumb-item active">Registro de articulo</li>
</ol>
    <div class="container-fluid">
        <div id="ui-view">
        <form method="POST" action="{{route('store.blog')}}" role="form" enctype="multipart/form-data">
        @csrf
                                <div class="row">
                                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
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
                    <div class="col-lg-9">
                            <div class="card">
                                <div class="card-header">
                                    <h5>REGISTRO DE ARTICULO</h5>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-lg-12 form-group">
                                            <input type="text" class="form-control" placeholder="Titulo de la entrada" name="titulo">
                        
                                        </div>
                                        <div class="col-lg-12 form-group">
                                            <textarea id="editor" type="text" class="form-control" placeholder="descripcion" name="contenido"></textarea>
                        
                                        </div>
                                        <div class="col-lg-12 form-group">
                                            <textarea class="form-control" style="height:80px !important" placeholder="Descripcion corta" name="excerpt" ></textarea>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                        
                    </div>
                    <div class="col-lg-3">
                        <div class="card">
                            <div class="card-header">
                                <h5>Imagen portada del articulo</h5>
                            </div>
                            <div class="card-body">
                                <div class="col-lg-12 form-group">
                                    <input type="file" class="form-control" placeholder="Titulo de la entrada" name="imagen">
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary"></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
 
@endsection