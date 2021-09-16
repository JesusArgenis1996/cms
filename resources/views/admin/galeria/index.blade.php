@extends('layouts.admin')
@section('contenido')

<ol class="breadcrumb">
    <li class="breadcrumb-item active">Galeria</li>
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
                        <div class="card">
                            <div class="card-header">
                                <h5>GALERIA</h5>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-12 form-group">
                                        <a href="" type="button" 
                                        class="btn btn-success" data-toggle="modal"
                                        data-target="#addphoto">Agregar foto</a>
                                    </div>
                                    <div class="modal fade" id="addphoto" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                        <form action="{{route('store.galeria')}}" method="post" role="form" enctype="multipart/form-data">
                                        @csrf
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLongTitle">Subir foto</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="row">
                                                        <div class="col-lg-12">
                                                            <input type="file" name="imagen" class="form-control">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                                    <button type="submit" class="btn btn-primary">Guardar</button>
                                                </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="row">
                                            @foreach($galeria as $item)
                                            <div class="col-lg-3 form-group">
                                                <div class="card">
                                                    <img src="{{asset('galeria/'.$item->imagen)}}" style="width:100% !important">
                                                    <div class="card-body">
                                                        <button type="button" 
                                                        class="btn btn-danger btn-sm" 
                                                        data-toggle="modal" 
                                                        data-target="#modal-{{$item->id}}">Eliminar</button>
                                                    </div>
                                                </div>
                                            </div>
                                            @endforeach
                                        </div>
                                        @include('admin.galeria.modal')
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