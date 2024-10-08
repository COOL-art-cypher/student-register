<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Basic -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- Mobile Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <!-- Site Metas -->
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <link rel="shortcut icon" href="{{ asset('user/images/favicon.png') }}" type="">

  <title>Student Management System</title>

  <!-- Bootstrap core CSS -->
  <link rel="stylesheet" type="text/css" href="{{ asset('user/css/bootstrap.css') }}" />

  <!-- Fonts style -->
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700;900&display=swap" rel="stylesheet">

  <!-- Owl Carousel stylesheet -->
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />

  <!-- Font Awesome style -->
  <link href="{{ asset('user/css/font-awesome.min.css') }}" rel="stylesheet" />

  <!-- Custom styles for this template -->
  <link href="{{ asset('user/css/style.css') }}" rel="stylesheet" />
  <!-- Responsive style -->
  <link href="{{ asset('user/css/responsive.css') }}" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.14/dist/sweetalert2.min.css">
   <!-- FontAwesome CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,300,400,600,700,800,900&display=swap" rel="stylesheet">

  <style>
    body {
      background-color: rgb(61, 141, 168); /* Example background color */
    }

    .pcolor {
      color: rgb(8, 59, 77);
    }

    .content {
      padding-top: 80px; /* Adjust this value if needed */
    }

    .navbar {
       /* Transparent blue background */
      backdrop-filter: blur(5px);
      padding: 20px;
      border-bottom: 1px solid rgb(7, 85, 90);
    }

    .nav-item.active a {
      color: #ffffff; /* White color for active nav link */
      font-weight: bold; /* Bold font for active nav link */
    }
    .custom-table {
            background-color: transparent;
            width: 100%;
        }

        .custom-table td, .custom-table th {
            border-bottom: 1px solid #0a5c70; /* Add bottom border to each td and th */
            padding: 10px; /* Add padding for cell content */
        }
  </style>
</head>

<body>

  <div class="hero_area">
    <div class="hero_bg_box">

    </div>

    <!-- Header section starts -->
    <header class="header_section fixed-top">
      <div class="container-fluid">
        <nav class="navbar navbar-expand-lg custom_nav-container">
          <a class="navbar-brand" href="{{ route('ui.home') }}">
            <img src="{{ asset('user/images/logo.png') }}" style="height:40px;width:40px"><span>ကွန်ပျူတာ တက္ကသိုလ် ဟင်္သာတ</span>
          </a>

          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
              <li class="nav-item {{ request()->routeIs('ui.home') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('ui.home') }}">ပင်မစာမျက်နှာ</a>
              </li>
               <li class="nav-item {{ request()->routeIs('ui.noticeAll') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('ui.noticeAll') }}">အသိပေးစာများ</a>
              </li>
              <li class="nav-item {{ request()->routeIs('ui.contact') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('ui.contact') }}">ဆက်သွယ်ရန်</a>
              </li>
              @if(Auth::check())

                    @if(Auth::user()->role=="user")
                      <li class="nav-item {{ request()->routeIs('stu.reg') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('stu.reg') }}">ကျောင်းအပ်ရန်</a>
              </li>
              <li class="nav-item {{ request()->routeIs('history') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('history') }}">History</a>
              </li>
                    @endif

              @else
              <li class="nav-item {{ request()->routeIs('ui.login') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('ui.login') }}">အကောင့်၀င်ရန်</a>
              </li>
              @endif

              @if(Auth::check() && Auth::user()->role == 'admin')

              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle wtext" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                   <img src="{{ asset('storage/images/'. Auth::user()->image) }}" class="rounded-circle" style="width: 30px; height: 30px; vertical-align: middle;"> {{ Auth::user()->name }}
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <a href="{{route('admin.index')}}" type="submit" class="dropdown-item mt-2" >Admin DashBoard</a>

                  <a href="{{route('logout')}}" type="submit" class="dropdown-item mt-2" onclick="return confirm('Are you sure?')">အကောင့်ထွက်ရန်</a>

              </li>

              @endif
              @if(Auth::check() && Auth::user()->role == 'user')
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle wtext" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <img src="{{ asset('storage/images/'. Auth::user()->image) }}" class="rounded-circle" style="width: 30px; height: 30px; vertical-align: middle;"> {{ Auth::user()->name }}
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">

                  <a href="{{route('logout')}}" type="submit" class="dropdown-item mt-2" onclick="return confirm('Are you sure?')">အကောင့်ထွက်ရန်</a>

              </li>
              @endif
            </ul>
          </div>
        </nav>
      </div>
    </header>
    <!-- End header section -->

    <!-- Slider section -->
    <div class="content" style="min-height: 700px;">
      @yield('content')
    </div>

    <section class="footer_section" style="background-color: rgb(14, 98, 131)">
      <div class="container">
        <p class="text-white">
          &copy; <span id="displayYear"></span> All Rights Reserved By Soe ZayYarKyaw
        </p>
      </div>
    </section>
    <!-- End about section -->
  </div>

  <!-- Footer section -->
  <!-- jQuery -->
  <script type="text/javascript" src="{{ asset('user/js/jquery-3.4.1.min.js') }}"></script>
  <!-- Popper JS -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
  <!-- Bootstrap JS -->
  <script type="text/javascript" src="{{ asset('user/js/bootstrap.js') }}"></script>
  <!-- Owl Carousel JS -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
  <!-- Custom JS -->
  <script type="text/javascript" src="{{ asset('user/js/custom.js') }}"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.14/dist/sweetalert2.all.min.js"></script>

  <script>
    const Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 2000,
      timerProgressBar: true,
      didOpen: (toast) => {
        toast.addEventListener('mouseenter', Swal.stopTimer);
        toast.addEventListener('mouseleave', Swal.resumeTimer);
      }
    });

    // Display success message if session success exists
    @if (session('success'))
    Toast.fire({
      icon: 'success',
      title: "{{ session('success') }}"
    });
    @endif

    // Add active class to nav items based on current URL
    $(document).ready(function () {
      const currentUrl = window.location.href;

      $('.nav-item').each(function () {
        const route = $(this).data('route');
        if (currentUrl.startsWith(route)) {
          $(this).addClass('active');
        }
      });
    });

    @if (session('error'))
    Toast.fire({
      icon: 'error',
      title: "{{ session('error') }}"
    });
    @endif
  </script>

</body>
</html>
