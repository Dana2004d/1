@extends('cms.parent')

@section('title','Visitor')
@section('main-title','Index Visitor')
@section('sub-title','Index Visitor')

@section('content')

<div class="card">

<div class="card-header">
<a href="{{ route('visitors.create') }}" class="btn btn-primary">ADD NEW Visitor</a>
<a href="{{ route('visitors.trashed') }}" class="btn btn-dark">
    Trashed Visitors
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
@foreach ($visitors as $visitor)
<tr>
<td>{{ $visitor->id }}</td>
<td>{{ $visitor->user->first_name ?? ""}}</td>
<td>{{ $visitor->user->last_name ?? ""}}</td>
<td>{{ $visitor->email }}</td>

<td>
@if(optional($visitor->user)->gender == 'male')
<span class="badge bg-primary">{{ optional($visitor->user)->gender }}</span>
@else
<span class="badge bg-info">{{ optional($visitor->user)->gender }}</span>
@endif
</td>

<td>
@if(optional($visitor->user)->status == 'active')
<span class="badge bg-success">{{ optional($visitor->user)->status }}</span>
@else
<span class="badge bg-danger">{{ optional($visitor->user)->status }}</span>
@endif
</td>

<td><span class="badge bg-info">{{ $visitor->user->location->name ?? "" }}</span></td>

<td>

<a href="{{ route('visitors.show',$visitor->id) }}" class="btn btn-info btn-sm">
<i class="fas fa-eye"></i>
</a>

<a href="{{ route('visitors.edit',$visitor->id) }}" class="btn btn-warning btn-sm">
<i class="fas fa-edit"></i>
</a>

<button onclick="performDestroy({{ $visitor->id }},this)" class="btn btn-danger btn-sm">
<i class="fas fa-trash"></i>
</button>

</td>
</tr>
@endforeach
</tbody>

</table>

{{ $visitors->links() }}

</div>
</div>

@endsection

@section('scripts')
<script>
function performDestroy(id,reference){
confirmDestroy('/cms/admin/visitors/'+id,reference);
}
</script>
@endsection
