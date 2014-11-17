<!DOCTYPE html>
<html lang="en-GB">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Insert title here</title>

<!-- Bootstrap -->
<link href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body>
{{-- Bootstrap container start --}}
	<div class="container">
	{{-- Bootstrap header start --}}
		<header class="page-header">
		@include('includes.header')
		{{-- Bootstrap header end --}}
		</header>

		@if(Session::has('message'))
						{{-- Bootstrap flash box start --}}
		<div class="alert alert-success">
		{{Session::get('message')}}
		</div>
		{{-- Bootstrap flash box end --}}
		@endif
     @if(Session::has('error'))
     						{{-- Bootstrap flash box start --}}
        <div class="alert alert-warning">
        {{Session::get('error')}}
        </div>
           						{{-- Bootstrap flash box end --}}
           						      @endif
						{{-- Bootstrap content start --}}
						<section class="page-content" id="content">
		@yield('content')
				{{-- Bootstrap content end --}}
				</section>
				
						{{-- Bootstrap footer start --}}
						<footer class="page-footer">
						@include('includes.footer')
						{{-- Bootstrap footer end --}}
						</footer>
								{{-- Bootstrap container end --}}
	</div>
	    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
	</body>
</html>