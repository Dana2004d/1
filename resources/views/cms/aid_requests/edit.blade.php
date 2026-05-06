@extends('cms.parent')

@section('title','Edit Aid Request')
@section('main-title','Aid Requests')
@section('sub-title','Edit')

@section('content')
<div class="card card-warning">

<div class="card-header">
<h3>Edit Aid Request</h3>
</div>

<form action="{{ route('aid_requests.update',$aid_request->id) }}" method="POST">
@csrf
@method('PUT')

<div class="card-body">
<div class="row">

<div class="col-md-4">
<input name="name" class="form-control"
value="{{ $aid_request->name }}">
</div>

<div class="col-md-4">
<input name="phone" class="form-control"
value="{{ $aid_request->phone }}">
</div>

<div class="col-md-4">
<input name="company_name" class="form-control"
value="{{ $aid_request->company_name }}">
</div>

<div class="col-md-4 mt-3">
<select name="aid_type" class="form-control">
<option value="food" @if($aid_request->aid_type=='food') selected @endif>Food</option>
<option value="medical" @if($aid_request->aid_type=='medical') selected @endif>Medical</option>
<option value="financial" @if($aid_request->aid_type=='financial') selected @endif>Financial</option>
<option value="other" @if($aid_request->aid_type=='other') selected @endif>Other</option>
</select>
</div>

<div class="col-md-4 mt-3">
<input name="link" class="form-control"
value="{{ $aid_request->link }}">
</div>

<div class="col-md-12 mt-3">
<textarea name="notes" class="form-control">
{{ $aid_request->notes }}
</textarea>
</div>

<!-- 🔥 Visitors -->
<div class="col-md-12 mt-3">
<label>Visitors</label>
<select name="visitors[]" class="form-control" multiple>

@foreach($visitors as $visitor)
<option value="{{ $visitor->id }}"
@if($aid_request->visitors->contains($visitor->id)) selected @endif>

{{ optional($visitor->user)->first_name }} {{ optional($visitor->user)->last_name }}

</option>
@endforeach

</select>
</div>

</div>
</div>

<div class="card-footer">
<button type="submit" class="btn btn-info">Update</button>
<a href="{{ route('aid_requests.index') }}" class="btn btn-secondary">Back</a>
</div>

</form>
</div>
@endsection
