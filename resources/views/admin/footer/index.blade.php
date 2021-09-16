@extends('layouts.admin')
@section('contenido')

<ol class="breadcrumb">
    <li class="breadcrumb-item active">Configuracion footer</li>
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
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form method="POST" action="{{route('update.footer',$footer->id)}}" role="form">
                        @csrf
                        @method('PUT')
                        <div class="card">
                            <div class="card-header">
                                <h4>CONFIGURACION FOOTER</h4>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-4 form-group">
                                        <label><b>Color de texto</b></label>
                                        <input type="text" class="jscolor form-control" name="color" value="{{$footer->color}}">
                                    </div>
                                    <div class="col-lg-4 form-group">
                                        <label><b>Color de fondo</b></label>
                                        <input type="text" class="jscolor form-control" name="background" value="{{$footer->background}}">
                                    </div>
                                    <div class="col-lg-4 form-group">
                                        <label><b>Telefono</b></label>
                                        <input type="text" class="form-control" name="telefono" placeholder="Telefono" value="{{$footer->telefono}}">
                                    </div>
                                    <div class="col-lg-12 form-group">
                                        <input type="text" class="form-control" name="cr" placeholder="Texto footer" value="{{$footer->cr}}">
                                    </div>
                                    <div class="col-lg-6">
                                        <input type="email" class="form-control" name="correo" placeholder="Correo" value="{{$footer->correo}}">
                                    </div>
                                    <div class="col-lg-6">
                                        <input type="text" class="form-control" name="horario" placeholder="Horarios" value="{{$footer->horario}}">
                                    </div>
                    
                                    <div class="col-lg-12">
                                        <textarea name="direccion" class="form-control" style="height:80px !important" >{{$footer->direccion}}</textarea>
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