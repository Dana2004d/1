@extends('cms.parent')

@section('title','Trashed Comments')

@section('content')

<div class="card">

<div class="card-header">
<a href="{{ route('comments.index') }}" class="btn btn-primary">
Back
</a>
</div>

<div class="card-body">

<table class="table table-bordered text-center">

<thead>
<tr>
<th>ID</th>
<th>Comment</th>
<th>Visitor</th>
<th>Action</th>
</tr>
</thead>

<tbody>

@foreach($comments as $comment)
<tr>

<td>{{ $comment->id }}</td>
<td>{{ $comment->comment_text }}</td>
<td>
{{ $comment->visitor->user->first_name ?? '' }}
{{ $comment->visitor->user->last_name ?? '' }}
</td>

<td>

<button onclick="restoreComment({{ $comment->id }},this)"
class="btn btn-success btn-sm">
Restore
</button>

<button onclick="forceDeleteComment({{ $comment->id }},this)"
class="btn btn-danger btn-sm">
Delete
</button>

</td>

</tr>
@endforeach

</tbody>

</table>

{{ $comments->links() }}

</div>
</div>

@endsection

@section('scripts')
<script>

// restore
function restoreComment(id,ref){
axios.put('/cms/admin/comments/'+id+'/restore')
.then(function(){
ref.closest('tr').remove();
});
}

// force delete
function forceDeleteComment(id,ref){
axios.delete('/cms/admin/comments/'+id+'/force-delete')
.then(function(){
ref.closest('tr').remove();
});
}

</script>
@endsection
