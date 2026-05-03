@extends('cms.parent')

@section('title','Edit Contact')

@section('content')
<div class="card">

<div class="card-body">

<select id="visitor_id" class="form-control mb-2">
@foreach($visitors as $visitor)
<option value="{{ $visitor->id }}"
@if($visitor->id == $contact->visitor_id) selected @endif>
{{ $visitor->email }}
</option>
@endforeach
</select>

<select id="message_type" class="form-control mb-2">

<option value="complaint" @if($contact->message_type=='complaint') selected @endif>Complaint</option>

<option value="suggestion" @if($contact->message_type=='suggestion') selected @endif>Suggestion</option>

<option value="question" @if($contact->message_type=='question') selected @endif>Question</option>

</select>

<textarea id="message" class="form-control mb-2">
{{ $contact->message }}
</textarea>

</div>

<div class="card-footer">
<button onclick="performUpdate({{ $contact->id }})" class="btn btn-warning">
Update
</button>
</div>

</div>
@endsection

@section('scripts')
<script>
function performUpdate(id){
let data = new FormData();

data.append('visitor_id', visitor_id.value);
data.append('message_type', message_type.value);
data.append('message', message.value);

storeRoute('/cms/admin/contacts/'+id, data);
}
</script>
@endsection
