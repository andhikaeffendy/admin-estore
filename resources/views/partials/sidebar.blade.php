<aside class="navbar navbar-vertical navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <h1 class="navbar-brand">Admin Panel</h1>
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="{{ route('dashboard') }}">
            <span class="nav-link-icon d-md-none d-lg-inline-block">
            <i class="ti ti-chart-bar"></i>
            </span>
            <span class="nav-link-title">Dashboard</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('products.index') }}">Produk</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('purchases.index') }}">
            <span class="nav-link-icon d-md-none d-lg-inline-block">
            <i class="ti ti-shopping-cart"></i>
            </span>
            <span class="nav-link-title">Pembelian</span>
        </a>
      </li>
      

    </ul>
  </div>
</aside>
