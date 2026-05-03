@extends('cms.parent')

@section('content')

<div class="card">
<div class="card-header">

<a href="{{ route('categories.create') }}" class="btn btn-primary">ADD</a>

<a href="{{ route('categories.trashed') }}" class="btn btn-dark">
Trashed
</a>

</div>

<table class="table text-center">
<tr>
<th>ID</th>
<th>Name</th>
<th>Status</th>
<th>Action</th>
</tr>

@foreach($categories as $c)
<tr>
<td>{{ $c->id }}</td>

<td>{{ $c->name }}</td>

<td>
@if($c->status=='active')
<span class="badge bg-success">Active</span>
@else
<span class="badge bg-danger">Inactive</span>
@endif
</td>

<td>

<a href="{{ route('categories.edit',$c->id) }}"
class="btn btn-warning btn-sm">
<i class="fas fa-edit"></i>
</a>

<button onclick="performDestroy({{ $c->id }},this)"
class="btn btn-danger btn-sm">
<i class="fas fa-trash"></i>
</button>

</td>

</tr>
@endforeach

</table>

{{ $categories->links() }}

</div>

@endsection

@section('scripts')
<script>
function performDestroy(id,ref){
confirmDestroy('/cms/admin/categories/'+id,ref);
}
</script>
@endsection
