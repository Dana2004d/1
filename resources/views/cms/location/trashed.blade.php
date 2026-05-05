@extends('cms.parent')

@section('title','Trashed Locations')

@section('content')

<div class="card">

<div class="card-header">
<a href="{{ route('locations.index') }}" class="btn btn-primary">
Back
</a>
</div>

<div class="card-body">

<table class="table table-bordered text-center">

<thead>
<tr>
<th>ID</th>
<th>Name</th>
<th>Governorate</th>
<th>Action</th>
</tr>
</thead>

<tbody>

@foreach($locations as $location)
<tr>

<td>{{ $location->id }}</td>
<td>{{ $location->name }}</td>
<td>{{ $location->governorate->name ?? '' }}</td>

<td>

<button onclick="restoreLocation({{ $location->id }},this)"
class="btn btn-success btn-sm">
Restore
</button>

<button onclick="forceDeleteLocation({{ $location->id }},this)"
class="btn btn-danger btn-sm">
Delete
</button>

</td>

</tr>
@endforeach

</tbody>

</table>

{{ $locations->links() }}

</div>
</div>

@endsection

@section('scripts')
<script>

// restore
function restoreLocation(id,ref){
axios.put('/cms/admin/locations/'+id+'/restore')
.then(function(){
ref.closest('tr').remove();
});
}

// force delete
function forceDeleteLocation(id,ref){
axios.delete('/cms/admin/locations/'+id+'/force-delete')
.then(function(){
ref.closest('tr').remove();
});
}

</script>
@endsection
