@extends('cms.parent')

@section('title','Contacts')

@section('content')
<div class="card">

<div class="card-header">
<a href="{{ route('contacts.create') }}" class="btn btn-primary">ADD NEW</a>
<a href="{{ route('contacts.trashed') }}" class="btn btn-dark">Trashed</a>
</div>

<div class="card-body">

<table class="table table-bordered text-center">
<thead>
<tr>
<th>ID</th>
<th>Visitor</th>
<th>Type</th>
<th>Message</th>
<th>Action</th>
</tr>
</thead>

<tbody>
@foreach($contacts as $contact)
<tr>
<td>{{ $contact->id }}</td>
<td>{{ $contact->visitor->email }}</td>
<td><span class="badge bg-info">{{ $contact->message_type }}</span></td>
<td>{{ $contact->message }}</td>

<td>
<a href="{{ route('contacts.show',$contact->id) }}" class="btn btn-info btn-sm">
<i class="fas fa-eye"></i>
</a>

<a href="{{ route('contacts.edit',$contact->id) }}" class="btn btn-warning btn-sm">
<i class="fas fa-edit"></i>
</a>

<button onclick="performDestroy({{ $contact->id }},this)" class="btn btn-danger btn-sm">
<i class="fas fa-trash"></i>
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
function performDestroy(id,ref){
confirmDestroy('/cms/admin/contacts/'+id,ref);
}
</script>
@endsection
