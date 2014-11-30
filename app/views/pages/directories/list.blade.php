@section('content')
<h1>Directory List</h1>
<table class="table">
<tr>
<th>Name</th>
<th>Type</th>
<th>Size</th>
</tr>
@if (isset($allSubdirectories))
<h2>Directories</h2>
@if (count($allSubdirectories>0))
@foreach ($allSubdirectories as $directory)
    <tr>
    <td>{{ link_to_action('DirectoryController@index', $directory['name'], array('id' => $directory['path']), array('target' => '_blank')) }}</td>
    <td>Directory</td>
    <td>{{ $directory['size'] }} </td>
    </tr>
        @endforeach
        @else
        <tr>
        <td colspan="3">No directories available.</td>
        </tr>
        @endif
    @endif
        <hr>
    @if (isset($allFiles))
    <h2>Files</h2>
    @if (count($allFiles>0))
	@foreach ($allFiles as $file)
	<tr>
	<td>{{ link_to_action('DirectoryController@show', $file['name'], array('path' => urlencode($file['path'])), array('target' => '_blank')) }}</td>
	<td>{{ $file['type'] }}</td>
	<td>{{ $file['size'] }} bytes</td>
		</tr>
	@endforeach
	@else
	<tr>
	<td colspan="3">No files.</td>
	</tr>
	@endif
	@endif
</table>
@stop