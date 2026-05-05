@extends('cms.parent')

@section('title','Trashed Visitors')
@section('main-title','Trashed Visitors')
@section('sub-title','Trashed Visitors')

@section('content')

<div class="card">

<div class="card-header">
<a href="{{ route('visitors.index') }}" class="btn btn-primary">
Back
</a>
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
@foreach($visitors as $visitor)
<tr>
<td>{{ $visitor->id }}</td>
<td>{{ $visitor->email }}</td>
<td>{{ $visitor->user->first_name ?? '' }} {{ $visitor->user->last_name ?? '' }}</td>

<td>

<form action="{{ route('visitors.restore', $visitor->id) }}" method="POST" style="display:inline;">
@csrf
<button class="btn btn-success btn-sm">Restore</button>
</form>

<form action="{{ route('visitors.forceDelete', $visitor->id) }}" method="POST" style="display:inline;">
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
