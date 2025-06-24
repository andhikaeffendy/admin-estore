<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
    <title>Admin Panel</title>

    <!-- Tabler core -->
    <link href="{{ asset('tabler/dist/css/tabler.min.css') }}" rel="stylesheet"/>
    <link href="{{ asset('tabler/dist/css/tabler-dark.min.css') }}" rel="stylesheet"/>
    <link href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/tabler-icons.min.css" rel="stylesheet"/>
    <style>
      .navbar-vertical {
        background-color: #0e132d;
      }
    </style>
  </head>
  <body class="layout-fluid layout-navbar-fixed layout-sidebar-fixed layout-dark">

    <div class="page">
      <!-- SIDEBAR -->
      <aside class="navbar navbar-vertical navbar-expand-lg">
        <div class="container-fluid">
          
          <div class="collapse navbar-collapse" id="sidebar-menu">
            <ul class="navbar-nav pt-lg-3">
              <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}" href="{{ route('dashboard') }}">
                  <span class="nav-link-icon"><i class="ti ti-home"></i></span>
                  <span class="nav-link-title">Dashboard</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link {{ request()->is('products*') ? 'active' : '' }}" href="{{ route('products.index') }}">
                  <span class="nav-link-icon"><i class="ti ti-package"></i></span>
                  <span class="nav-link-title">Produk</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link {{ request()->is('purchases*') ? 'active' : '' }}" href="{{ route('purchases.index') }}">
                  <span class="nav-link-icon"><i class="ti ti-shopping-cart"></i></span>
                  <span class="nav-link-title">Pembelian</span>
                </a>
              </li>
            </ul>
          </div>
        </div>
      </aside>

      <!-- MAIN CONTENT -->
      <div class="page-wrapper">
        <!-- HEADER -->
        <header class="navbar navbar-expand-md d-print-none">
          <div class="container-xl">
            <div class="navbar-nav flex-row order-md-last">
              <div class="nav-item">
                <span class="nav-link">Selamat datang, Admin!</span>
              </div>
            </div>
            <div class="navbar-nav">
              <button class="btn btn-outline-primary d-lg-none" type="button" data-bs-toggle="collapse" data-bs-target="#sidebar-menu">
                <i class="ti ti-menu-2"></i>
              </button>
            </div>
          </div>
        </header>

        <!-- BODY -->
        <div class="page-body">
          <div class="container-xl py-3">
            @yield('content')
          </div>
        </div>
      </div>
    </div>

    <!-- Tabler Core -->
    <script src="{{ asset('tabler/dist/js/tabler.min.js') }}"></script>
  </body>
</html>
