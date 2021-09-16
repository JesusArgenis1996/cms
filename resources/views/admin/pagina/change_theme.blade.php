@extends('layouts.admin')
@section('contenido')

<ol class="breadcrumb">
    <li class="breadcrumb-item active">Mecado de plantillas</li>
</ol>
    <div class="container-fluid">
        <div id="ui-view">
            <div>
                <div class="row">
                    <div class="col-lg-12">
                    @if(Session::has('success'))
                        <div class="alert alert-success alert-dismissible fade show mb-4 mt-4" role="alert">
                            {{Session::get('succes')}}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidde="true">$times;</span>
                            </button>
                        </div>
                    @endif
                        <div class="card">
                            <div class="card-body">
                               <div class="row">
                                @foreach($plantillas as $item)
                                    @if($item->id == $pagina->id_plantilla)
                                    <div class="col-lg-4 form-group">
                                        <form action="{{route('update_theme')}}" method="POST" role="form">
                                        @csrf
                                        @method('PUT')
                                            <div class="card">
                                                <div class="card-header" style="background: #353535 !important; color: white !important;">
                                                    <input type="hidden" value="{{$item->id}}" name="id_plantilla">
                                                    <h5>{{$item->titulo}}</h5> <br>
                                                    <span>Codigo de plantilla: {{$item->id}}</span>
                                                </div>
                                                <img src="{{asset('portadas/'.$item->portada)}}" style="width: 100% !important">
                                                <div class="card-body">
                                                    <p class="text-justify">{{substr($item->descripcion,0,150)}}</p>
                                                </div>
                                                <div class="card-footer">
                                                    <button class="btn btn-primary" type="submit">Activar Plantilla</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    @else($item->id != $pagina->id_plantilla)
                                    <div class="col-lg-4 form-group">
                                        <form action="{{route('update_theme')}}" method="POST" role="form">
                                        @csrf
                                        @method('PUT')
                                            <div class="card">
                                                <div class="card-header">
                                                    <input type="hidden" value="{{$item->id}}" name="id_plantilla">
                                                    <h5>{{$item->titulo}}</h5> <br>
                                                    <span>Codigo de plantilla: {{$item->id}}</span>
                                                </div>
                                                <img src="{{asset('portadas/'.$item->portada)}}" style="width: 100% !important">
                                                <div class="card-body">
                                                    <p class="text-justify">{{substr($item->descripcion,0,150)}}</p>
                                                </div>
                                                <div class="card-footer">
                                                    <button class="btn btn-primary" type="submit">Activar Plantilla</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    @endif
                                @endforeach
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