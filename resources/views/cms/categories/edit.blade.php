@extends('cms.parent')

@section('content')

<div class="card">
<div class="card-body">

<input id="name" class="form-control mb-2"
value="{{ $category->name }}">

<textarea id="description" class="form-control mb-2">
{{ $category->description }}
</textarea>

<select id="status" class="form-control">
<option selected>{{ $category->status }}</option>
<option value="active">Active</option>
<option value="inactive">Inactive</option>
</select>

</div>

<div class="card-footer">
<button onclick="performUpdate({{ $category->id }})"
class="btn btn-warning">Update</button>
</div>

</div>

@endsection

@section('scripts')
<script>
function performUpdate(id){
let data = new FormData();

data.append('name',name.value);
data.append('description',description.value);
data.append('status',status.value);

storeRoute('/cms/admin/categories/'+id,data);
}
</script>
@endsection
