<!DOCTYPE html>
<html lang="en">

<head>
  <title>Admin Dashboard - SHUTTHEGOODS.CO</title>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="robots" content="noindex, nofollow"> <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous" />
  <link rel="stylesheet" type="text/css" href="{{ asset('css/vendor.css') }}" />
  <link rel="stylesheet" type="text/css" href="{{ asset('style.css') }}" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />

  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link
    href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,opsz,wght@0,9..40,100..1000;1,9..40,100..1000&family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap"
    rel="stylesheet" />
</head>

<body>
  <div class="preloader-wrapper">
    <div class="preloader"></div>
  </div>

  <header class="p-3 mb-2 mt-2 sticky-top bg-white shadow-sm z-3">
    <div class="container-fluid">
      <div class="d-flex flex-wrap align-items-center justify-content-between">
        <a href="{{ route('admin.dashboard') }}" class="d-flex align-items-center text-dark text-decoration-none me-3">
          <h2 class="logo-title m-0">Admin Panel</h2>
        </a>

        <ul class="nav justify-content-center flex-grow-1">
          <li class="nav-item">
            <a href="{{ route('admin.dashboard') }}" class="nav-link px-3 text-dark active text-uppercase">Manajemen Produk</a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link px-3 text-dark text-uppercase">Pesanan</a>
          </li>
           <li class="nav-item">
            <a href="#" class="nav-link px-3 text-dark text-uppercase">Users</a>
          </li>
        </ul>

        <div class="d-flex align-items-center ms-3">
          <div class="dropdown">
            <a href="#" class="d-block link-dark text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2" />
                    <circle cx="12" cy="7" r="4" />
                </svg>
                <span class="ms-1">{{ Auth::user()->name }}</span>
            </a>
            <ul class="dropdown-menu dropdown-menu-end text-small shadow">
                <li><a class="dropdown-item" href="#">Profil</a></li>
                <li><hr class="dropdown-divider"></li>
                <li>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <a class="dropdown-item" href="{{ route('logout') }}" 
                           onclick="event.preventDefault(); this.closest('form').submit();">
                            Logout
                        </a>
                    </form>
                </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </header>
  
  <main class="py-4">
      <div class="container-lg">
          @yield('content')
      </div>
  </main>
  <div id="footer-bottom" class="bg-light py-3 mt-5">
    <div class="container-lg">
      <div class="row">
        <div class="col-md-6 copyright">
          <p>© 2025 Shutthegoods Admin. Hak cipta dilindungi.</p>
        </div>
      </div>
    </div>
  </div>
  
  <script src="{{ asset('js/jquery-1.11.0.min.js') }}"></script>
  <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
    crossorigin="anonymous"></script>
  <script src="{{ asset('js/plugins.js') }}"></script>
  <script src="{{ asset('js/script.js') }}"></script>
</body>
</html>