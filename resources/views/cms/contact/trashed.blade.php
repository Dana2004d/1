@extends('cms.parent')

@section('title','Trashed Contacts')

@section('content')
<div class="card">

<div class="card-header">
<a href="{{ route('contacts.index') }}" class="btn btn-primary">
Back
</a>
</div>

<div class="card-body">

<table class="table table-bordered text-center">

<thead>
<tr>
<th>ID</th>
<th>Visitor</th>
<th>Type</th>
<th>Action</th>
</tr>
</thead>

<tbody>

@foreach($contacts as $contact)
<tr>

<td>{{ $contact->id }}</td>

<td>{{ $contact->visitor->email }}</td>

<td>{{ $contact->message_type }}</td>

<td>

<button onclick="restore({{ $contact->id }},this)"
class="btn btn-success btn-sm">
Restore
</button>

</td>

</tr>
@endforeach

</tbody>

</table>

{{ $contacts->links() }}

</div>
</div>
@endsection

@section('scripts')
<script>
function restore(id,ref){
axios.put('/cms/admin/contacts/'+id+'/restore')
.then(function (){
ref.closest('tr').remove();
});
}
</script>
@endsection
