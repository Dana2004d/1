@extends('cms.parent')

@section('content')
<div class="card card-warning">

<div class="card-header">
<h3>Message Details</h3>
</div>

<div class="card-body">

<p><strong>Visitor:</strong>
{{ $contact->visitor->email }}
</p>

<p><strong>Type:</strong>
{{ $contact->message_type }}
</p>

<p><strong>Message:</strong>
{{ $contact->message }}
</p>

</div>

<div class="card-footer">
<a href="{{ route('contacts.index') }}" class="btn btn-primary">
Back
</a>
</div>

</div>
@endsection
