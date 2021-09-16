@extends('layouts.admin')
@section('contenido')

<ol class="breadcrumb">
    <li class="breadcrumb-item active"><a href="{{route('index.slider')}}">Listado de slider</a> </li>
    <li class="breadcrumb-item active">Registro de slider</li>
</ol>
    <div class="container-fluid">
        <div id="ui-view">
            <div>
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
                    <div class="col-lg-8">
                        <form method="POST" action="{{route('store.slider')}}" role="form" enctype="multipart/form-data">
                        @csrf
                            <div class="card">
                                <div class="card-header">
                                    <h5>REGISTRO DE SLIDER</h5>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-lg-12 form-group">
                                            <input type="text" class="form-control" placeholder="Titulo del slider" name="titulo">
                        
                                        </div>
                                        <div class="col-lg-6 form-group">
                                            <input type="file" class="form-control" placeholder="Titulo de la entrada" name="imagen">
                        
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