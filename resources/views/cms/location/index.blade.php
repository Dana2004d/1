@extends('cms.parent')

@section('title','Location')
@section('main-title','Index Location')
@section('sub-title','Index Location')

@section('content')

<div class="card">

<div class="card-header">
<a href="{{ route('locations.create') }}" class="btn btn-primary">ADD NEW Location</a>
<a href="{{ route('locations.trashed') }}" class="btn btn-dark">
    Trashed
</a>
</div>

<div class="card-body">
<table class="table table-bordered">
<thead>
<tr>
<th>ID</th>
<th>Name</th>
<th>Governorate</th>
<th>Action</th>
</tr>
</thead>

<tbody>
@foreach ($locations as $Location)
<tr>
<td>{{ $Location->id }}</td>
<td>{{ $Location->name }}</td>
<td><span class="badge bg-info">{{ $Location->governorate->name ?? "" }}</span></td>

<td>
<a href="{{ route('locations.show',$Location->id) }}" class="btn btn-info btn-sm">
<i class="fas fa-eye"></i>
</a>

<a href="{{ route('locations.edit',$Location->id) }}" class="btn btn-warning btn-sm">
<i class="fas fa-edit"></i>
</a>

<button onclick="performDestroy({{ $Location->id }},this)" class="btn btn-danger btn-sm">
<i class="fas fa-trash"></i>
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
function performDestroy(id,reference){
confirmDestroy('/cms/admin/locations/'+id,reference);
}
</script>
@endsection
