<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/jquery.min.js')}}"defer></script>
    <script src="{{ asset('js/popper.js')}} "defer></script>
    <script src="{{ asset('js/bootstrap.min.js')}} "defer></script>
    <script src="{{ asset('js/main.js')}}"defer></script>
    @stack('scripts')
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    @stack('styles')
</head>
<body>

<div class="wrapper d-flex align-items-stretch">
			<nav id="sidebar">
				<div class="custom-menu">
					<button type="button" id="sidebarCollapse" class="btn btn-primary">
	          <i class="fa fa-bars"></i>
	          <span class="sr-only">Toggle Menu</span>
	        </button>
        </div>
				<div class="p-4">
		  		<h1><a href="index.html" class="logo">Inventory Product <span>Aditya Kharisma - Askrindo Syariah</span></a></h1>
	        <ul class="list-unstyled components mb-5">
          <li class="">
	            <span> Data Master</span>
	          </li>
	          <li class="{{ ($sidebar == 1) ? 'active' : ''}}">
	            <a href="/category"><span class="fa fa-home mr-3"></span> Master Kategori </a>
	          </li>
	          <li class="{{ ($sidebar == 2) ? 'active' : ''}}">
	              <a href="/item"><span class="fa fa-user mr-3"></span> Master Barang</a>
            </li>
            <li class="">
	            <span>Transaksi</span>
	          </li>
	          <li class="{{ ($sidebar == 3) ? 'active' : ''}}">
              <a href="/transaction"><span class="fa fa-briefcase mr-3"></span> Data Transaksi</a>
            </li>
            <li class="">
	            <span> Laporan</span>
	          </li>
	          <li class="{{ ($sidebar == 4) ? 'active' : ''}}">
              <a href="/transaction/report/items"><span class="fa fa-sticky-note mr-3"></span> Laporan Stok Barang</a>
	          </li>
	          <li class="{{ ($sidebar == 5) ? 'active' : ''}}">
              <a href="/transaction/report/sales"><span class="fa fa-sticky-note mr-3"></span> Laporan Penjualan</a>
	          </li>
	        </ul>


	        <div class="footer">
	        </div>

	      </div>
    	</nav>

        <!-- Page Content  -->
      <div id="content" class="p-4 p-md-5 pt-5">
      @yield('content')
        
			</div>
		</div>

    </div>
</body>
</html>
