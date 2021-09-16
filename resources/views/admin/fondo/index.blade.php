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
                                <h5>MIS PATTERNS</h5>
                            </div>
                            <div class="card-body">
                                <div class="row">          
                                    <div class="col-lg-12">
                                        <div class="row">
                                           <div class="col-lg-2">
                                               <form method="POST" action = "{{route('update.fondo',$id_general)}}">
                                                   @csrf
                                                   @method('PUT')
                                                   <input type="hidden" name="fondo" value="{{$general->fondo}}"> 
                                                   <div class="card">
                                                       <img src="{{asset('recursos_fondo/'..$general->fondo)}}" style="width: 100% !important">
                                                       <div class="card-body" style="background: #191919 !important; color:white !important">
                                                           <center><button type="submit" class="btn btn-warning">Seleccionar</button></center>
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
                    
                </div>
            </div>
        </div>
    </div>
</div>
 
@endsection