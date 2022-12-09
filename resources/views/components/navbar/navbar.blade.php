<div class="w-100 bg-white px-4 px-lg-5 py-2 d-flex align-items-center justify-content-between">
	<div class="navbar-brand">
		<a href="{{ URL::to('/') }}">
			<img id="logo-navbar" src="{{ asset('assets/img/logo.png') }}" alt="logo"/>
		</a>
	</div>
	<div class="d-flex align-items-center">
		@if(Auth::check() && Auth::user()->role == 'users')
			<ul class="navbar-link list-unstyled m-0 d-flex align-items-center">
				<li><a href="{{ URL::to('account') }}"><i class='bx bx-user-circle mr-2'></i> {{ Auth::user()->name }}</a></li>
				<li class="d-none d-lg-block"><a href="{{ URL::to('logout') }}" class="btn btn-info btn-sm rounded-pill py-2 px-3 text-white">Logout</a></li>
				<li><i id="open-menu" class='bx bx-menu'></i></li>
			</ul>
		@else
			<ul class="navbar-link list-unstyled m-0 d-flex align-items-center">
				<li><a href="{{ URL::to('login') }}"><i class='bx bx-user-circle mr-2'></i> Log in</a></li>
				<li class="d-none d-lg-block"><a href="{{ URL::to('register') }}" class="btn btn-info btn-sm rounded-pill py-2 px-3 text-white">Register</a></li>
				<li><i id="open-menu" class='bx bx-menu'></i></li>
			</ul>
		@endif
	</div>
</div>
<div id="sidebar" class="d-flex bg-white w-100 vh-100 bg-transparent">
	<div class="overlay w-100 h-100"></div>
	<div class="content bg-white p-4">
		<div class="w-100 text-end">
			<button id="close-menu" class="btn btn-outline-secondary"><i id="close-sidebar" class="bx bx-x"></i></button>
		</div>
		@if(Auth::check())
		<div class="text-center">
			<img class="w-100" src="{{ asset('assets/img/login-illust.jpg') }}" alt="login-illust"/>
			<p class="lead">Go to your account and check your booking.</p>
			<a href="{{ URL::to('account') }}" class="btn w-100 btn-lg btn-info">My accout</a>
			<a class="d-block mt-3" href="{{ URL::to('logout') }}">Logout</a>
		</div>
		@else
		<div class="text-center">
			<img class="w-100" src="{{ asset('assets/img/login-illust.jpg') }}" alt="login-illust"/>
			<p class="lead">Login to travelku.id to book special flight and offer.</p>
			<a href="{{ URL::to('login') }}" class="btn w-100 btn-lg btn-info">Login</a>
			<a class="d-block mt-3" href="{{ URL::to('register') }}">Create account</a>
		</div>
		@endif
	</div>
</div>