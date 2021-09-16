<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>{{$general->titulo}}</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Montserrat:300,400,500,700" rel="stylesheet">
  <link href="{{asset('css/fuentes.css')}}" rel="stylesheet">
  <!-- Vendor CSS Files -->
  <link href="{{asset('themes/1002/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{asset('themes/1002/vendor/icofont/icofont.min.css')}}" rel="stylesheet">
  <link href="{{asset('themes/1002/vendor/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
  <link href="{{asset('themes/1002/vendor/ionicons/css/ionicons.min.css')}}" rel="stylesheet">
  <link href="{{asset('themes/1002/vendor/animate.css/animate.min.css')}}" rel="stylesheet">
  <link href="{{asset('themes/1002/vendor/venobox/venobox.css')}}" rel="stylesheet">
  <link href="{{asset('themes/1002/vendor/owl.carousel/assets/owl.carousel.min.css')}}" rel="stylesheet">
  <link href="{{asset('themes/1002/vendor/aos/aos.css')}}" rel="stylesheet">
  <link href="{{asset('css/all.css')}}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{asset('themes/1002/css/style.css')}}" rel="stylesheet">
  

  <!-- =======================================================
  * Template Name: BizPage - v3.2.1
  * Template URL: https://bootstrapmade.com/bizpage-bootstrap-business-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body style="font-family: {{$general->fuente}} !important; font-size: {{$general->size}} !important">

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top header-transparent" style="background: {{$menu->background}} !important">
    <div class="container-fluid">

      <div class="row justify-content-center">
        <div class="col-xl-11 d-flex align-items-center">
          <h1 class="logo mr-auto"><a style="color: {{$menu->color}} !important" href="index.html"> <img src="{{asset('general/'.$general->logo)}}" style="width: 40px">{{$menu->titulo}}</a></h1>
          <!-- Uncomment below if you prefer to use an image logo -->
          <!-- <a href="index.html" class="logo mr-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

          <nav class="nav-menu d-none d-lg-block">
            <ul>
              @foreach($items_menu as $item)
                        <li class="active">
                         <a style="color: {{$menu->color}} !important" class="rd-nav-link" href="{{$item->enlace}}"><?php echo $item->icono?>{{ $item->titulo}}</a>
                        </li>
                @endforeach
            </ul>
          </nav><!-- .nav-menu -->
        </div>
      </div>

    </div>
  </header><!-- End Header -->

  @yield('1002')

  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="footer-top" style="background: {{$footer->background}} !important">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6 footer-info">
            <img src="{{asset('general/'.$general->logo)}}" style="width:120px !important">
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Enlaces rapidos</h4>
            <ul>
              @foreach($items_menu as $item)
              <li style="color: {{$menu->color}} !important"><a href="{{$item->enlace}}"><?php echo $item->icono?></a></li>
              @endforeach
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-contact">
            <h4>Contactanos</h4>
            <p>
              <?php echo $footer->direccion?>
              <strong>Telefono:</strong> {{$footer->telefono}}<br>
              <strong>Email:</strong> {{$footer->correo}}<br>
            </p>

            

          </div>

          <div class="col-lg-3 col-md-6 footer-newsletter">
            <h4>{{$menu->titulo}}</h4>
          </div>

        </div>
      </div>
    </div>

    <div class="container">
      <div class="copyright">
        <p>{{$footer->cr}}</p>
      </div>
      
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
  <!-- Uncomment below i you want to use a preloader -->
  <!-- <div id="preloader"></div> -->

  <!-- Vendor JS Files -->
  <script src="{{asset('themes/1002/vendor/jquery/jquery.min.js')}}"></script>
  <script src="{{asset('themes/1002/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('themes/1002/vendor/jquery.easing/jquery.easing.min.js')}}"></script>
  <script src="{{asset('themes/1002/vendor/php-email-form/validate.js')}}"></script>
  <script src="{{asset('themes/1002/vendor/waypoints/jquery.waypoints.min.js')}}"></script>
  <script src="{{asset('themes/1002/vendor/counterup/counterup.min.js')}}"></script>
  <script src="{{asset('themes/1002/vendor/isotope-layout/isotope.pkgd.min.js')}}"></script>
  <script src="{{asset('themes/1002/vendor/venobox/venobox.min.js')}}"></script>
  <script src="{{asset('themes/1002/vendor/owl.carousel/owl.carousel.min.js')}}"></script>
  <script src="{{asset('themes/1002/vendor/aos/aos.js')}}"></script>

  <!-- Template Main JS File -->
  <script src="{{asset('themes/1002/js/main.js')}}"></script>
  <script src="{{asset('js/all.js')}}"></script>

</body>

</html>