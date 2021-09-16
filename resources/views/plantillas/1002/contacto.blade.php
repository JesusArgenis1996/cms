@extends('plantillas.1002.admin')
@section('1002')
<!-- ======= Contact Section ======= -->
<section id="contact" class="section-bg" style="margin-top: 70px !important">
      <div class="container" data-aos="fade-up">

        <div class="section-header">
          <h3>Contacto</h3>
        </div>

        <div class="row contact-info">

          <div class="col-md-4">
            <div class="contact-address">
              <i class="ion-ios-location-outline"></i>
              <h3>Direccion</h3>
              <address><?php echo $footer->direccion?></address>
            </div>
          </div>

          <div class="col-md-4">
            <div class="contact-phone">
              <i class="ion-ios-telephone-outline"></i>
              <h3>Telefono</h3>
              <p><a href="tel:+155895548855">{{$footer->telefono}}</a></p>
            </div>
          </div>

          <div class="col-md-4">
            <div class="contact-email">
              <i class="ion-ios-email-outline"></i>
              <h3>Email</h3>
              <p><a href="mailto:info@example.com">{{$footer->correo}}</a></p>
            </div>
          </div>

        </div>

        <div class="form">
          <form action="{{route('store_contacto',$dominio)}}" method="post" role="form" class="php-email-form">
          @csrf
          <input type="hidden" value="{{$id_pagina}}" name="id_pagina">
            <div class="form-row">
              <div class="form-group col-md-6">
                <input type="text" name="nombres" class="form-control" id="name" placeholder="Nombre completos" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                <div class="validate"></div>
              </div>
              <div class="form-group col-md-6">
                <input type="email" class="form-control" name="correo" id="email" placeholder="Correo electornico" data-rule="email" data-msg="Please enter a valid email" />
                <div class="validate"></div>
              </div>
            </div>
            <div class="form-group">
              <input type="text" class="form-control" name="telefono" id="subject" placeholder="Telefono" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
              <div class="validate"></div>
            </div>
            <div class="form-group">
              <textarea class="form-control" name="mensaje" rows="5" data-rule="required" data-msg="Please write something for us" placeholder="Mensaje"></textarea>
              <div class="validate"></div>
            </div>
            <div class="mb-3">
              <div class="loading">Loading</div>
              <div class="error-message"></div>
              <div class="sent-message">Your message has been sent. Thank you!</div>
            </div>
            <div class="text-center"><button type="submit">Send Message</button></div>
          </form>
        </div>

      </div>
    </section><!-- End Contact Section -->
|@endsection