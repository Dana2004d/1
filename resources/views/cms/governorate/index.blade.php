@extends('cms.parent')

@section('title','Governorate')
@section('main-title','Index Governorate')
@section('sub-title','Index Governorate')

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
<a href="{{ route('governorates.create') }}" class="btn btn-primary">ADD NEW Governorate</a>
<a href="{{ route('governorates.trashed') }}" class="btn btn-dark">
    Trashed
</a>
</div>

<div class="card-body">
<table class="table table-bordered">
<thead>
<tr>
<th>ID</th>
<th>Name</th>
<th>Locations</th>
<th>Action</th>
</tr>
</thead>

<tbody>
@foreach($governorates as $governorate)
<tr>
<td>{{ $governorate->id }}</td>
<td>{{ $governorate->name }}</td>
<td><span class="badge bg-info">{{ $governorate->locations_count }}</span></td>

<td>
<a href="{{ route('governorates.show',$governorate->id) }}" class="btn btn-info btn-sm">
<i class="fas fa-eye"></i>
</a>

<a href="{{ route('governorates.edit',$governorate->id) }}" class="btn btn-warning btn-sm">
<i class="fas fa-edit"></i>
</a>

<button onclick="performDestroy({{ $governorate->id }},this)" class="btn btn-danger btn-sm">
<i class="fas fa-trash"></i>
</button>
</td>
</tr>
@endforeach
</tbody>
</table>
</div>

{{ $governorates->links() }}

</div>
</div>
</div>
</div>
</section>

@endsection

@section('scripts')
<script>
function performDestroy(id,reference){
confirmDestroy('/cms/admin/governorates/'+id,reference);
}
</script>
@endsection
