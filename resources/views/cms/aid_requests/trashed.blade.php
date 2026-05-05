@extends('cms.parent')

@section('title','Trashed Aid Requests')

@section('content')
<div class="card">

<div class="card-header d-flex justify-content-between">
    <h4>Trashed Aid Requests</h4>

    <a href="{{ route('aid_requests.index') }}" class="btn btn-primary">
        Back
    </a>
</div>

<div class="card-body">

<table class="table table-bordered text-center">

<thead>
<tr>
<th>ID</th>
<th>Name</th>
<th>Phone</th>
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

<!-- Restore -->
<form method="POST" action="{{ route('aid_requests.restore',$a->id) }}" style="display:inline;">
    @csrf
    <button class="btn btn-success btn-sm">
        <i class="fas fa-undo"></i>
    </button>
</form>

<!-- Force Delete -->
<form method="POST" action="{{ route('aid_requests.forceDelete',$a->id) }}" style="display:inline;">
    @csrf
    @method('DELETE')
    <button class="btn btn-danger btn-sm">
        <i class="fas fa-trash"></i>
    </button>
</form>

</td>

</tr>
@endforeach

</tbody>

</table>
 <div class="card-footer">
        <a href="{{ route('aid_requests.index') }}" class="btn btn-primary">GO BACK</a>
    </div>
</div>
</div>
@endsection
