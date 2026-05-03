@extends('cms.parent')

@section('title','Create Contact')

@section('content')
<div class="card card-warning">

<div class="card-header">
<h3>Create Message</h3>
</div>

<div class="card-body">

<div class="form-group">
<label>Visitor</label>
<select id="visitor_id" class="form-control">
@foreach($visitors as $visitor)
<option value="{{ $visitor->id }}">
{{ $visitor->email }}
</option>
@endforeach
</select>
</div>

<div class="form-group mt-3">
<label>Message Type</label>
<select id="message_type" class="form-control">
<option value="complaint">Complaint</option>
<option value="suggestion">Suggestion</option>
<option value="question">Question</option>
</select>
</div>

<div class="form-group mt-3">
<label>Message</label>
<textarea id="message" class="form-control"></textarea>
</div>

</div>

<div class="card-footer">
<button onclick="performStore()" class="btn btn-success">Save</button>
<a href="{{ route('contacts.index') }}" class="btn btn-secondary">Back</a>
</div>

</div>
@endsection

@section('scripts')
<script>
function performStore(){
let data = new FormData();

data.append('visitor_id', visitor_id.value);
data.append('message_type', message_type.value);
data.append('message', message.value);

store('/cms/admin/contacts', data);
}
</script>
@endsection 
