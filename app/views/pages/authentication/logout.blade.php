@extends('layouts.default')
@section('content')
<h2>Log Out</h2>
<br>To log back in, please {{link_to_route('login.index', 'click here')}}.
@stop