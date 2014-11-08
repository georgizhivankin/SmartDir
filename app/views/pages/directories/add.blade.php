@section('content')
	<h1>Add a New Directory</h1>
<br>
{{ Form::open(array('route' => 'DirectoryController.store', 'method' => 'post')) }}

@if($errors->all())
<ul>
	{{ implode('', $errors->all('
	<li>:message</li>'))}}
</ul>
@endif

<div>
{{ Form::label('name', 'Directory Name') }}
{{ Form::text('name', '', array(
'id' => 'name',
'placeholder' => 'Enter a directory name',
 'class' => 'form-control',
 'maxlength' => '255'
 ))
	}}
	</div>
		<div>
{{ Form::label('path', 'Directory Path') }}
{{ Form::text('directory_path', '', array(
'id' => 'directory_path',
'disabled' => true,
'placeholder' => $path,
 'class' => 'form-control',
 'maxlength' => '255'
 ))
	}}
	{{ Form::hidden('path', $path, array(
'id' => 'path',
'placeholder' => $path,
 'class' => 'form-control',
 'maxlength' => '255'
 ))
 }}
	</div>
	<div>
	{{ Form::label('assigned_to_user', 'Assigned To') }}
		{{ Form::select('assigned_to_user', $users_array) }}
	</div>
	<div>
	{{ Form::label('home_directory', 'Make a home directory') }}
	{{ Form::radio('home_directory', '1') }}Yes<br/>
	{{ Form::radio('home_directory', '0', true)}} No</br>
	</div>
{{ Form::submit('Add', array('id' => 'btn-submit', 'class' => 'btn btn-primary')) }}
{{ Form::close() }}
	
@stop