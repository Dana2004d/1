@extends('cms.parent')

@section('title','Edit Location')
@section('main-title','Edit Location')
@section('sub-title','Edit Location')

@section('content')
<div class="card card-warning">

<div class="card-header">
<h3 class="card-title">Edit Location</h3>
</div>

<div class="card-body">

<div class="form-group">
<label>Governorate</label>

<select class="form-control" id="governorate_id">

@foreach($governorates as $governorate)
<option
@if ($governorate->id == $location->governorate_id) selected @endif
value="{{ $governorate->id }}">
{{ $governorate->name }}
</option>
@endforeach

</select>

</div>

<div class="form-group">
<label>Location Name</label>

<input type="text"
class="form-control"
id="name"
value="{{ $location->name }}">
</div>

</div>

<div class="card-footer">
<button onclick="performUpdate({{ $location->id }})" class="btn btn-info">
Update
</button>

<a href="{{ route('locations.index') }}" class="btn btn-primary">
GO BACK
</a>
</div>

</div>
@endsection

@section('scripts')
<script>
function performUpdate(id){
    let data = new FormData();

    data.append('name', document.getElementById('name').value);
    data.append('governorate_id', document.getElementById('governorate_id').value);

    storeRoute('/cms/admin/locations_update/'+id, data);
}
</script>
@endsection
