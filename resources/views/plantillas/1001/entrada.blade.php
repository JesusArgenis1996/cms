@extends('plantillas.1001.admin')
@section('1001')

      <!-- Section Shop-->
      <section class="section section-xl bg-default text-md-left">
        <div class="container">
          <div class="row row-50 row-md-60">
            <div class="col-lg-8 col-xl-9">
              <div class="inset-xl-right-100">
                <div class="row row-50 row-md-60 row-lg-80">
                  <div class="col-12">
                    <article class="post post-modern box-xxl">
                      <div class="post-modern-panel">
                        <div><a class="post-modern-tag" href="#">News</a></div>
                      </div>
                      <h3 class="post-modern-title">{{$entrada->titulo}}</h3>
                      
                      <p class="post-modern-text"><?php echo $entrada->contenido ?></p>
                      
                    </article>
                    <!-- Quote Classic-->
                    
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
@endsection