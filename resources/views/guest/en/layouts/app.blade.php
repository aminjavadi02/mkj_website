<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- additional css -->
  <link rel="stylesheet" href="{{asset('assets/css/guestpagesCss/guestPages.css')}}">
  
  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

  <!-- jQuery library -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

  <!-- Latest compiled JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script> 

  <!-- swiper -->
  <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />

  <!-- material icons -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <title>MKJ</title>
</head>
<body>
  <div class="wrapper">
    @include('guest.en.inc.navbar')
    <div class="preloader" id="preloader" style="background: #0D0121 url({{asset('assets/img/loader.gif')}});"></div>
    <div class="main">
      <canvas class="backgroundPicture"></canvas>
      @yield('content')
    </div>
    @include('guest.en.inc.footer')
  </div>




<script src="https://cdnjs.cloudflare.com/ajax/libs/particlesjs/2.2.3/particles.min.js"></script>
<script>
  var loader = document.getElementById('preloader');
  window.onload = function () {
    setTimeout(function () {
      // set timeout function is only to delay loading an showing the gif a bit longer
      // delete if deployed
      loader.style.display = 'none';
    },1000)

    
  }
</script>


  <script src="{{asset('assets/js/core/jquery.min.js')}}"></script>
  <script src="{{asset('assets/js/core/popper.min.js')}}"></script>
  <script src="{{asset('assets/js/core/bootstrap-material-design.min.js')}}"></script>

  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
</body>
</html>