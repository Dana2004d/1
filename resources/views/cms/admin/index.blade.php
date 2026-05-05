@extends('cms.parent')

@section('title','Admin')
@section('main-title','Index Admin')
@section('sub-title','Index Admin')

@section('styles')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
td .btn {
border-radius: 6px;
width: 36px;
height: 36px;
padding: 0;
margin: 2px;
display: inline-flex;
align-items: center;
justify-content: center;
transition: all 0.2s ease-in-out;
}

td .btn i {
font-size: 14px;
pointer-events: none;
}

td .btn:hover {
transform: scale(1.08);
opaAdmin: 0.95;
box-shadow: 0 2px 6px rgba(0,0,0,0.2);
}

td.text-center {
white-space: nowrap;
}
</style>

@endsection

@section('content')

<section class="content">
<div class="container-fluid">
<div class="row">
<div class="col-md-12">

<div class="card">
<div class="card-header">
<a href="{{ route('admins.create') }}" class="btn btn-primary">ADD NEW Admin</a>
<a href="{{ route('admins.trashed') }}" class="btn btn-dark">
    Trashed Admins
</a>
</div>

<div class="card-body">
<table class="table table-bordered">
<thead>
<tr>
<th>ID</th>
<th>First Name</th>
<th>Last Name</th>
<th>Email</th>
<th>Gender</th>
<th>Status</th>
<th>Location</th>
<th>Action</th>
</tr>
</thead>

<tbody>
@foreach ($admins as $admin)
<tr>
<td>{{ $admin->id }}</td>
<td>{{ $admin->user->first_name ?? ""}}</td>
<td>{{ $admin->user->last_name ?? ""}}</td>
<td>{{ $admin->email }}</td>

<td>
@if(optional($admin->user)->gender == 'male')
<span class="badge bg-primary">{{ optional($admin->user)->gender }}</span>
@else
<span class="badge bg-info">{{ optional($admin->user)->gender }}</span>
@endif
</td>

<td>
@if(optional($admin->user)->status == 'active')
<span class="badge bg-success">{{ optional($admin->user)->status }}</span>
@else
<span class="badge bg-danger">{{ optional($admin->user)->status }}</span>
@endif
</td>

<td>
<span class="badge bg-info">
{{ $admin->user->location->name ?? "" }}
</span>
</td>

<td class="text-center">

<a href="{{ route('admins.show', $admin->id) }}" class="btn btn-info btn-sm">
<i class="fas fa-eye"></i>
</a>

<a href="{{ route('admins.edit', $admin->id) }}" class="btn btn-warning btn-sm">
<i class="fas fa-edit"></i>
</a>

<button type="button"
onclick="performDestroy({{ $admin->id }}, this)"
class="btn btn-danger btn-sm">
<i class="fas fa-trash"></i>
</button>

</td>
</tr>
@endforeach
</tbody>
</table>
</div>

{{ $admins->links() }}

</div>

</div>
</div>
</div>
</section>

@endsection

@section('scripts')
<script>
function performDestroy(id, reference){
confirmDestroy('/cms/admin/admins/'+id, reference);
}
</script>
@endsection
