@section('content')
<table class="table">
<tr>
<th>ID</th>
<th>User Name</th>
<th>Email</th>
<th>First Name</th>
<th>Last Name</th>
<th>Role</th>
</tr>
	@foreach ($users as $user)
	<tr>
	<td>{{$user->id}}</td>
	<td>{{$user->username}}</td>
	<td>{{$user->email}}</td>
	</tr>
	@endforeach
</table>
@stop