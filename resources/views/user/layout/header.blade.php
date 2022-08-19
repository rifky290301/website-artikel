<header id="header" class="header d-flex align-items-center fixed-top">
  <div class="container-fluid container-xl d-flex align-items-center justify-content-between">
    <a href="/" class="logo d-flex align-items-center">
      <h1>MandeMedia</h1>
    </a>
    <nav id="navbar" class="navbar">
      <ul>
        <li><a href="/">Beranda</a></li>
        <li><a href="/search">Kategori</a></li>
        {{-- <li><a href="/about">About</a></li> --}}
        <li><a href="/contact">Contact</a></li>
      </ul>
    </nav>
    <div class="position-relative">
      <a href="#" class="mx-2 js-search-open"><span class="bi-search"></span></a>
      <i class="bi bi-list mobile-nav-toggle"></i>
      <div class="search-form-wrap js-search-form-wrap">
        <form action="/search" method="get" class="search-form">
          @csrf
          <span class="icon bi-search"></span>
          <input value="{{ old('cari') }}" type="text" placeholder="Search" class="form-control">
          <button type="submit" class="btn js-search-close"><span class="bi-x"></span></button>
        </form>
      </div>
    </div>
  </div>
</header>