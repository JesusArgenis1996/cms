@extends('plantillas.1002.admin')
@section('1002')
<section id="about" style="margin-top: 85px !important;">
    <div class="container">
        <header class="section-header">
            <h3>{{$blog->titulo}}</h3>
        </header>
        <div class="row">
                <div class="col-lg-12">
                    <?php echo $blog->contenido?>
                </div>
        </div>
    </div>
</section>

@endsection