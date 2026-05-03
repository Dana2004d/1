@extends('cms.parent')

@section('title','Aid Requests')
@section('main-title','Aid Requests')
@section('sub-title','Index')

@section('content')
<div class="card">
<div class="card-header">
<a href="{{ route('aid_requests.create') }}" class="btn btn-primary">ADD NEW</a>
</div>
<a href="{{ route('aid_requests.trashed') }}" class="btn btn-dark">
<i class="fas fa-trash"></i> Trashed
</a>
<div class="card-body">
<table class="table table-bordered text-center">
<thead>
<tr>
<th>ID</th>
<th>Name</th>
<th>Phone</th>
<th>Type</th>
<th>Company</th>
<th>Action</th>
</tr>
</thead>

<tbody>
@foreach($aid_requests as $a)
<tr>
<td>{{ $a->id }}</td>
<td>{{ $a->name }}</td>
<td>{{ $a->phone }}</td>

<td>
<span class="badge bg-info">{{ $a->aid_type }}</span>
</td>

<td>{{ $a->company_name }}</td>

<td>
<a href="{{ route('aid_requests.show',$a->id) }}" class="btn btn-info btn-sm">
<i class="fas fa-eye"></i>
</a>

<a href="{{ route('aid_requests.edit',$a->id) }}" class="btn btn-warning btn-sm">
<i class="fas fa-edit"></i>
</a>

<button onclick="performDestroy({{ $a->id }},this)" class="btn btn-danger btn-sm">
<i class="fas fa-trash"></i>
</button>
</td>
</tr>
@endforeach
</tbody>
</table>

{{ $aid_requests->links() }}
</div>
</div>
@endsection

@section('scripts')
<script>
function performDestroy(id,ref){
confirmDestroy('/cms/admin/aid_requests/'+id,ref);
}
</script>
@endsection
