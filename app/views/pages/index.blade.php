@extends('layouts.default')
@section('content')
@if (Auth::check())
<h1>Welcome, {{ucfirst(Auth::user()->username)}}</h2>
<br/>
{{link_to_route('logout.logout', 'Log out')}}
@else
<h1>Welcome</h1>
@endif
<br/>
This is the content area.
@stop