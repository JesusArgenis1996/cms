@extends('plantillas.1002.admin')
@section('1002')
<!-- ======= About Us Section ======= -->
<section id="about" style="margin-top: 85px !important;">
      <div class="container" data-aos="fade-up">

        <header class="section-header">
          <h3>Nuestro blog</h3>
          </header>

        <div class="row about-cols">
          @foreach($blog as $item)
          <div class="col-md-4" data-aos="fade-up" data-aos-delay="100">
                <div class="about-col">
                <div class="img">
                    <img src="{{asset('blog/'.$item->imagen)}}" alt="" class="img-fluid" style="width: 100% !important">
                    <div class="icon"><i class="ion-ios-speedometer-outline"></i></div>
                </div>
                <h2 class="title"><a href="http://127.0.0.1:8000/inmaculada/contenido/pagina/blog/{{$item->slug}}">{{$item->titulo}}</a></h2>
                <p>
                    {{$item->excerpt}}
                </p>
            </div>
          </div>
          @endforeach

        </div>

        <div class="row">
            <div class="col-lg-12">
                {{$galeria->render()}}
            </div>
        </div>
      </div>
    </section><!-- End About Us Section -->
@endsection