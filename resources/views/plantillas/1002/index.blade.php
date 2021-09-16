@extends('plantillas.1002.admin')
@section('1002')
<!-- ======= Intro Section ======= -->
<section id="intro">
    <div class="intro-container">
      <div id="introCarousel" class="carousel  slide carousel-fade" data-ride="carousel">

        <ol class="carousel-indicators"></ol>

        <div class="carousel-inner" role="listbox">
          
          <div class="carousel-item active" style="background-image: url({{asset('sliders/'.$slider[0]->imagen)}}">
          
            <div class="carousel-container">
              <div class="container">
                <h2 class="animate__animated animate__fadeInDown">{{$slider[0]->titulo}}</h2>
                
              </div>
            </div>
          </div>
         
          @foreach($slider as $item)
            @if($item->id != $slider[0]->id)
            <div class="carousel-item" style="background-image: url({{asset('sliders/'.$item->imagen)}}">
              <div class="carousel-container">
                <div class="container">
                  <h2 class="animate__animated animate__fadeInDown">{{$item->titulo}}</h2>
                  
                  
                </div>
              </div>
            </div>
            @endif
          @endforeach
        <a class="carousel-control-prev" href="#introCarousel" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon ion-chevron-left" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>

        <a class="carousel-control-next" href="#introCarousel" role="button" data-slide="next">
          <span class="carousel-control-next-icon ion-chevron-right" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>

      </div>
    </div>
  </section><!-- End Intro Section -->

  <main id="main">

    <!-- ======= Featured Services Section Section ======= -->
    <!-- End Featured Services Section -->

    <!-- ======= About Us Section ======= -->
    <section id="about">
      <div class="container" data-aos="fade-up">

        <header class="section-header">
          <h3>{{$seccion_uno->titulo}}</h3>
          
        </header>

        <div class="row about-cols">

          <div class="col-md-6" data-aos="fade-up" data-aos-delay="100">
            <img src="{{asset('secciones/'.$seccion_uno->imagen)}}" style="width:100%">
          </div>

          <div class="col-md-6" data-aos="fade-up" data-aos-delay="200" style="word-wrap: break-word">
            <p><?php echo $seccion_uno->descripcion?></p>
          </div>

         
        </div>

      </div>
    </section><!-- End About Us Section -->

    <!-- ======= About Us Section ======= -->
    <section id="about">
      <div class="container" data-aos="fade-up">

        <header class="section-header">
          <h3>Nuestro blog</h3>
          </header>

        <div class="row about-cols">
          @foreach($blog_index as $item)
          <div class="col-md-4" data-aos="fade-up" data-aos-delay="100">
            <div class="about-col">
              <div class="img">
                <img src="{{asset('blog/'.$item->imagen)}}" alt="" class="img-fluid" style="width: 100% !important">
                <div class="icon"><i class="ion-ios-speedometer-outline"></i></div>
              </div>
              <h2 class="title"><a href="#">{{$item->titulo}}</a></h2>
              <p>
                {{$item->excerpt}}
              </p>
            </div>
          </div>
          @endforeach

        </div>

      </div>
    </section><!-- End About Us Section -->

    <!-- ======= About Us Section ======= -->
    <section id="about">
      <div class="container" data-aos="fade-up">

        <header class="section-header">
          <h3>{{$seccion_dos->titulo}}</h3>
          
        </header>

        <div class="row about-cols">
          <div class="col-md-6" data-aos="fade-up" data-aos-delay="200" style="word-wrap: break-word">
            <p><?php echo $seccion_dos->descripcion?></p>
          </div>
          <div class="col-md-6" data-aos="fade-up" data-aos-delay="100">
            <img src="{{asset('secciones/'.$seccion_dos->imagen)}}" style="width:100%">
          </div>   
        </div>

      </div>
    </section><!-- End About Us Section -->

    <!-- ======= Portfolio Section ======= -->
    <section id="portfolio" class="section-bg">
      <div class="container" data-aos="fade-up">

        <header class="section-header">
          <h3 class="section-title">Galeria</h3>
        </header>

      <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="200">
        @foreach($galeria_index as $item)
        <div class="col-lg-4 col-md-6 portfolio-item filter-app">
          <div class="portfolio-wrap">
            <figure>
              <img src="{{asset('galeria/'.$item->imagen)}}" class="img-fluid" alt="">
              <a href="{{asset('galeria/'.$item->imagen)}}" data-lightbox="portfolio" data-title="App 1" class="link-preview"><i class="ion ion-eye"></i></a>
              <a href="{{asset('galeria/'.$item->imagen)}}" class="link-details" title="More Details"><i class="ion ion-android-open"></i></a>
            </figure>

            <div class="portfolio-info">
              <
            </div>
          </div>
        </div>
        @endforeach
        
      </div>

      </div>
    </section><!-- End Portfolio Section -->

    <!-- ======= Our Clients Section ======= -->
    <section id="clients">
      <div class="container" data-aos="zoom-in">

        <header class="section-header">
          <h3>Enlaces recomendados</h3>
        </header>

        <div class="owl-carousel clients-carousel">
          @foreach($enlace as $item)          
            <a href="{{$item->enlace}}">
              <img src="{{asset('enlace/'.$item->imagen)}}" alt="">
            </a>
          @endforeach
        </div>

      </div>
    </section><!-- End Our Clients Section -->

    <!-- ======= Testimonials Section ======= -->
    <section id="testimonials" class="section-bg">
      <div class="container" data-aos="fade-up">

        <header class="section-header">
          <h3>Nuestro equipo</h3>
        </header>

        <div class="owl-carousel testimonials-carousel">

        @foreach($equipo as $item)
        <div class="testimonial-item">
            <img src="{{asset('equipo/'.$item->imagen)}}" class="testimonial-img" alt="">
            <h3>{{$item->nombres}}</h3>
            <h4>{{$item->cargo}}</h4>
          </div>
        @endforeach

        </div>

      </div>
    </section><!-- End Testimonials Section -->

    

  </main><!-- End #main -->
@endsection