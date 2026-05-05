@extends('cms.parent')

@section('title','Trashed Admins')

@section('content')

<div class="card">

<div class="card-header">
<a href="{{ route('admins.index') }}" class="btn btn-primary">Back</a>
</div>

<div class="card-body">

<table class="table table-bordered">

<thead>
<tr>
<th>ID</th>
<th>Email</th>
<th>Name</th>
<th>Actions</th>
</tr>
</thead>

<tbody>
@foreach($admins as $admin)
<tr>
<td>{{ $admin->id }}</td>
<td>{{ $admin->email }}</td>
<td>{{ $admin->user->first_name ?? '' }} {{ $admin->user->last_name ?? '' }}</td>

<td>

<form action="{{ route('admins.restore', $admin->id) }}" method="POST" style="display:inline;">
@csrf
<button class="btn btn-success btn-sm">Restore</button>
</form>

<form action="{{ route('admins.forceDelete', $admin->id) }}" method="POST" style="display:inline;">
@csrf
@method('DELETE')
<button class="btn btn-danger btn-sm" onclick="return confirm('Delete forever?')">
Delete
</button>
</form>

</td>
</tr>
@endforeach
</tbody>

</table>

</div>
</div>

@endsection
