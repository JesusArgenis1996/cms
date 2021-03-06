@extends('plantillas.1001.admin')
@section('1001')
<section class="breadcrumbs-custom" style="margin-top: 150px !important;">
    <div class="parallax-container" data-parallax-img="{{asset('themes/1001/images/bg-about.jpg')}}">
          <div class="breadcrumbs-custom-body parallax-content context-dark">
            <div class="container">
              <h1 class="breadcrumbs-custom-title">Contactacnos</h1>
            </div>
          </div>
        </div>
        <div class="breadcrumbs-custom-footer">
          <div class="container">
            <ul class="breadcrumbs-custom-path">
              <li class="active">Complete el formulario</li>
            </ul>
          </div>
        </div>
      </section>
      @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
      <!-- Get in touch-->
      <section class="section section-xl bg-default text-md-left">
        <div class="container">
          <div class="title-classic">
            <h3 class="title-classic-title">Escribanos</h3>
            <p class="title-classic-subtitle">Le responderemos lo ma srapido posible, en el correo electronico que mando</p>
          </div>
          <form method="POST" action="{{route('store_contacto',$dominio)}}">
          @csrf
            <div class="row row-20 row-md-30">
              <div class="col-lg-8">
                <div class="row row-20 row-md-30">
                  <div class="col-sm-12">
                    <div class="form-wrap">
                        <input type="hidden" value="{{$id_pagina}}" name="id_pagina">
                      <input class="form-input" id="contact-first-name-2" type="text" name="nombres" data-constraints="@Required"/>
                      <label class="form-label" for="contact-first-name-2">Nombres Completos</label>
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-wrap">
                      <input class="form-input" id="contact-email-2" type="email" name="correo" data-constraints="@Email @Required"/>
                      <label class="form-label" for="contact-email-2">Correo Electronico</label>
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-wrap">
                      <input class="form-input" id="contact-phone-2" type="text" name="telefono" data-constraints="@Numeric"/>
                      <label class="form-label" for="contact-phone-2">Telefono</label>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-4">
                <div class="form-wrap">
                  <label class="form-label" for="contact-message-2">Mensaje</label>
                  <textarea class="form-input textarea-lg" id="contact-message-2" name="mensaje" data-constraints="@Required"></textarea>
                </div>
              </div>
            </div>
            <button class="button button-lg button-secondary button-zakaria" type="submit">Enviar mensaje</button>
          </form>
        </div>
      </section>
@endsection