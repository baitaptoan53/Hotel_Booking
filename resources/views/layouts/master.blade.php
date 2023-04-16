<!DOCTYPE html>
<html lang="en">

<head>
               <meta charset="utf-8">
               <title>Hotelier - Hotel HTML Template</title>
               <meta content="width=device-width, initial-scale=1.0" name="viewport">
               <meta content="" name="keywords">
               <meta content="" name="description">

               <!-- Favicon -->
               <link href="img/favicon.ico" rel="icon">

               <!-- Google Web Fonts -->
               <link rel="preconnect" href="https://fonts.googleapis.com">
               <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
               <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700&family=Montserrat:wght@400;500;600;700&display=swap"
                              rel="stylesheet">

               <!-- Icon Font Stylesheet -->
               <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
               <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css"
                              rel="stylesheet">

               <link rel="stylesheet" href="{{'css/animate.min.css'}}">
               <link rel="stylesheet" href="{{'css/owl.carousel.min.css'}}">
               <link rel="stylesheet" href="{{'css/tempusdominus-bootstrap-4.min.css'}}">
               <link rel="stylesheet" href="{{'css/bootstrap.min.css'}}">
               <link rel="stylesheet" href="{{'css/style.css'}}">
</head>

<body>
               <div class="container-xxl bg-white p-0">
                              <!-- Spinner Start -->
                              <div id="spinner"
                                             class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
                                             <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;"
                                                            role="status">
                                                            <span class="sr-only">Loading...</span>
                                             </div>
                              </div>
                              <!-- Spinner End -->
                              @include('layouts.header')
                              @yield('content')
                              @include('layouts.footer')
               </div>
               <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
               <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
               <script src="{{asset('js/main.js')}}"></script>
               <script src="{{asset('js/counterup.min.js')}}"></script>
               <script src="{{asset('js/waypoints.min.js')}}"></script>
               <script src="{{asset('js/owl.carousel.min.js')}}"></script>
               <script src="{{asset('js/wow.min.js')}}"></script>
               <script src="{{asset('js/easing.min.js')}}"></script>
               <script src="{{asset('js/moment-timezone.min.js')}}"></script>
               <script src="{{asset('js/moment.min.js')}}"></script>
               <script src="{{asset('js/tempusdominus-bootstrap-4.min.js')}}"></script>



</body>

</html>