@extends('cms.parent')

@section('title','Show Data of Governorate')
@section('main-title','Show Data of Governorate')
@section('sub-title','Show Data of Governorate')

@section('content')
<div class="card card-warning">

<div class="card-header">
<h3 class="card-title">Show Data of Governorate</h3>
</div>

<div class="card-body">

<div class="form-group">
<label>Governorate Name</label>
<input type="text" class="form-control" disabled
value="{{ $governorate->name }}">
</div>

<div class="form-group">
<label>Locations</label>

@foreach ($governorate->locations as $location)
<input type="text" class="form-control mb-2" disabled
value="{{ $location->name }}">
@endforeach

</div>

</div>

<div class="card-footer">
<a href="{{ route('governorates.index') }}" class="btn btn-primary">
GO BACK
</a>
</div>

</div>
@endsection
