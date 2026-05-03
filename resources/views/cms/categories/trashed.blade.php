@extends('cms.parent')

@section('content')

<div class="card">
<table class="table text-center">

<tr>
<th>ID</th>
<th>Name</th>
<th>Restore</th>
</tr>

@foreach($categories as $c)
<tr>
<td>{{ $c->id }}</td>
<td>{{ $c->name }}</td>

<td>
<button onclick="restore({{ $c->id }},this)"
class="btn btn-success btn-sm">
Restore
</button>
</td>

</tr>
@endforeach

</table>
</div>

@endsection

@section('scripts')
<script>
function restore(id,ref){
axios.post('/cms/admin/categories/restore/'+id)
.then(()=>location.reload());
}
</script>
@endsection
