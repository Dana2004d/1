@extends('cms.parent')

@section('title','Create Aid Request')
@section('main-title','Aid Requests')
@section('sub-title','Create')

@section('content')
<div class="card card-warning">

<div class="card-header">
<h3>Create Aid Request</h3>
</div>

<form action="{{ route('aid_requests.store') }}" method="POST">
@csrf

<div class="card-body">
<div class="row">

<div class="col-md-4">
<input name="name" class="form-control" placeholder="Name">
</div>

<div class="col-md-4">
<input name="phone" class="form-control" placeholder="Phone">
</div>

<div class="col-md-4">
<input name="company_name" class="form-control" placeholder="Company">
</div>

<div class="col-md-4 mt-3">
<select name="aid_type" class="form-control">
<option value="food">Food</option>
<option value="medical">Medical</option>
<option value="financial">Financial</option>
<option value="other">Other</option>
</select>
</div>

<div class="col-md-4 mt-3">
<input name="link" class="form-control" placeholder="Link">
</div>

<div class="col-md-12 mt-3">
<textarea name="notes" class="form-control" placeholder="Notes"></textarea>
</div>

<!-- 🔥 Visitors -->
<div class="col-md-4 mt-3">
<label>Category</label>

<select name="category_id" class="form-control" required>

<option value="">Choose Category</option>

@foreach($categories as $category)
<option value="{{ $category->id }}">
{{ $category->name }}
</option>
@endforeach

</select>
</div>
<div class="col-md-12 mt-3">
<label>Visitors</label>
<select name="visitors[]" class="form-control" multiple>
@foreach($visitors as $visitor)
<option value="{{ $visitor->id }}">
{{ $visitor->first_name }}
</option>
@endforeach
</select>
</div>

</div>
</div>

<div class="card-footer">
<button type="submit" class="btn btn-success">Save</button>
<a href="{{ route('aid_requests.index') }}" class="btn btn-secondary">Back</a>
</div>

</form>
</div>
@endsection
