@section('content')
<h1>File list</h1>
<table class="table">
<tr>
<th>Name</th>
<th>Type</th>
<th>Size</th>
</tr>
<h2>Directories</h2>
@foreach ($allSubdirectories as $directory)
    <tr>
    <td>{{$directory}}</td>
    </tr>
    @endforeach
    <hr>
    <h2>Files</h2>
	@foreach ($allFiles as $file)
	<tr>
	<td>{{$file}}</td>
		</tr>
	@endforeach
</table>
@stop