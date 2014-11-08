@extends('layouts.default')
@section('content')
<h2>Register</h2>
<br>
{{ Form::open(array('route' => 'UserController.store', 'method' => 'post')) }}

@if($errors->all())
<ul>
	{{ implode('', $errors->all('
	<li>:message</li>'))}}
</ul>
@endif

<div>
{{ Form::label('email', 'Email Address') }}
{{ Form::text('email', '', array(
'id' => 'email',
'placeholder' => 'Enter an email address',
 'class' => 'form-control',
 'maxlength' => '255'
 ))
	}}
	</div>

<div>
{{ Form::label('username', 'Username') }}
{{ Form::text('username', '', array(
'id' => 'username',
'placeholder' => 'Enter a username',
 'class' => 'form-control',
 'maxlength' => '128'
 ))
	}}
	</div>

<div>
{{ Form::label('password', 'Password') }}
{{ Form::password('password', '', array(
'id' => 'password',
'placeholder' => 'Enter a password',
 'class' => 'form-control',
 'maxlength' => '255'
 ))
	}}</div>

	@if ( (Auth::check()) && (Auth::user()->is_admin=="1"))
	<div>{{ Form::label('is_admin', 'Make an Administrator') }}
	{{ Form::radio('is_admin', '1')}}Yes<br/>
	{{ Form::radio('is_admin', '0', true)}}No</br>
	</div>
	@endif

{{ Form::submit('Register', array('id' => 'btn-submit', 'class' => 'btn btn-primary')) }} {{ Form::close() }}
@stop