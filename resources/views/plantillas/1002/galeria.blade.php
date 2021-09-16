@extends('plantillas.1002.admin')
@section('1002')
<!-- ======= Portfolio Section ======= -->
<section id="portfolio" class="section-bg" style="margin-top: 85px !important;">
      <div class="container" data-aos="fade-up">

        <header class="section-header">
          <h3 class="section-title">Galeria</h3>
        </header>

      <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="200">
        @foreach($galeria as $item)
        <div class="col-lg-4 col-md-6 portfolio-item filter-app">
          <div class="portfolio-wrap">
            <figure>
              <img src="{{asset('galeria/'.$item->imagen)}}" class="img-fluid" alt="">
              <a href="{{asset('galeria/'.$item->imagen)}}" data-lightbox="portfolio" data-title="App 1" class="link-preview"><i class="ion ion-eye"></i></a>
              <a href="{{asset('galeria/'.$item->imagen)}}" class="link-details" title="More Details"><i class="ion ion-android-open"></i></a>
            </figure>

            <div class="portfolio-info">
              
            </div>
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
    </section><!-- End Portfolio Section -->

@endsection