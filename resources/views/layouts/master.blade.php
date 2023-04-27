<!DOCTYPE html>
<html lang="en">

<head>
               <meta charset="utf-8">
               <title>@yield('title')</title>
               <meta content="width=device-width, initial-scale=1.0" name="viewport">
               <meta content="" name="keywords">
               <meta content="" name="description">

               <!-- Favicon -->

               <!-- Google Web Fonts -->
               <link rel="preconnect" href="https://fonts.googleapis.com">
               <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
               <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700&family=Montserrat:wght@400;500;600;700&display=swap"
                              rel="stylesheet">

               <!-- Icon Font Stylesheet -->
               <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
               <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css"
                              rel="stylesheet">

               <link rel="stylesheet" href="{{asset('css/animate.min.css')}}">
               <link rel="stylesheet" href="{{asset('css/owl.carousel.min.css')}}">
               <link rel="stylesheet" href="{{asset('css/tempusdominus-bootstrap-4.min.css')}}">
               <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
               <link rel="stylesheet" href="{{asset('css/style.css')}}">
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
               <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
               <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
               <script src="{{asset('js/main.js')}}"></script>
               <script src="{{asset('js/counterup.min.js')}}"></script>
               <script src="{{asset('js/easing.min.js')}}"></script>
               <script src="{{asset('js/owl.carousel.min.js')}}"></script>
               <script src="{{asset('js/moment-timezone.min.js')}}"></script>
               <script src="{{asset('js/moment.min.js')}}"></script>
               <script src="{{asset('js/tempusdominus-bootstrap-4.min.js')}}"></script>
               <script src="{{asset('js/waypoints.min.js')}}"></script>
               <script src="{{asset('js/wow.min.js')}}"></script>
               <link rel="stylesheet"
                              href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" />
               <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
               @stack('scripts')


</body>

</html>
