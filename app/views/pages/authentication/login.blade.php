@extends('layouts.default')
@section('content')
<h2>Login</h2>
<br>
{{ Form::open(array('route' => 'login.login', 'method' => 'post')) }}

@if($errors->all())
<ul>
	{{ implode('', $errors->all('
	<li>:message</li>'))}}
</ul>
@endif

<div>{{ Form::label('email', 'Email Address') }} {{ Form::text('email')
	}}</div>

<div>{{ Form::label('password', 'Password') }} {{ Form::password('password')
	}}</div>

{{ Form::submit('Login') }} {{ Form::close() }}
@stop