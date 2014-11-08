<nav role="navigation" class="navbar navbar-default">

	<!-- Brand and toggle get grouped for better mobile display -->
	<div class="navbar-header">
		<button type="button" data-target="#navbarCollapse"
			data-toggle="collapse" class="navbar-toggle">
			<span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span>
			<span class="icon-bar"></span> <span class="icon-bar"></span>
		</button>

		<a href="#" class="navbar-brand">Brand</a>
	</div>

	<!-- Collection of nav links, forms, and other content for toggling -->
	<div id="navbarCollapse" class="collapse navbar-collapse">

		<ul class="nav navbar-nav">
			<li class="active"><a href="{{URL::action('IndexController@showIndex')}}">Home</a></li>
			<li><a href="#">Profile</a></li>
			<li class="dropdown"><a data-toggle="dropdown"
				class="dropdown-toggle" href="#">User Registration and Login <b class="caret"></b></a>

				<ul role="menu" class="dropdown-menu">
				
				@if (!Auth::check())

					<li><a href="{{URL::action('UserController@create')}}">Register</a></li>

					<li><a href="{{URL::action('LoginController@showLogin')}}">Login</a></li>

					<li class="divider"></li>
					
					@else

					<li><a href="{{URL::action('LogoutController@logout')}}">Log Out</a></li>
					
					@endif

				</ul></li>

		</ul>

		<ul class="nav navbar-nav navbar-right">

			<li><a href="{{URL::action('StaticController@showAbout')}}">About</a></li>
						<li><a href="{{URL::action('StaticController@showContact')}}">Contact</a></li>

		</ul>

	</div>

</nav>