@section('content')
<h1>Directory List</h1>
<table class="table">
<tr>
<th>Name</th>
<th>Type</th>
<th>Size</th>
</tr>
<h2>Directories</h2>
@foreach ($allSubdirectories as $directory)
    <tr>
    <td>{{ link_to_action('DirectoryController@index', $directory['name'], $params = array('id' => $directory['path'])) }}</td>
    <td>Directory</td>
    <td>{{ $directory['size'] }} </td>
    </tr>
    @endforeach
    <hr>
    <h2>Files</h2>
	@foreach ($allFiles as $file)
	<tr>
	<td>{{ link_to_action('DirectoryController@show', $file['name'], $params = array('id' => $file['path'])) }}</td>
	<td>{{ $file['type'] }}</td>
	<td>{{ $file['size'] }} bytes</td>
		</tr>
	@endforeach
</table>
@stop