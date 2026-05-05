@extends('cms.parent')

@section('title','Edit Comment')
@section('main-title','Edit Comment')
@section('sub-title','Edit Comment')

@section('content')
<div class="card card-warning">

<div class="card-header">
<h3 class="card-title">Edit Comment</h3>
</div>

<div class="card-body">

<div class="form-group">
<label>Visitor Name</label>
<select class="form-control" id="visitor_id">

@foreach($visitors as $visitor)
<option
@if ($visitor->id == $comment->visitor_id) selected @endif
value="{{ $visitor->id }}">
{{ $visitor->user->first_name ?? "" }} {{ $visitor->user->last_name ?? "" }}
</option>
@endforeach

</select>
</div>

<div class="form-group">
<label>Comment Text</label>
<input type="text"
class="form-control"
id="comment_text"
value="{{ $comment->comment_text }}">
</div>

</div>

<div class="card-footer">
<button onclick="performUpdate({{ $comment->id }})" class="btn btn-warning">
Update
</button>

<a href="{{ route('comments.index') }}" class="btn btn-primary">
GO BACK
</a>
</div>

</div>
@endsection

@section('scripts')
<script>
function performUpdate(id){
    let data = new FormData();

    data.append('visitor_id', document.getElementById('visitor_id').value);
    data.append('comment_text', document.getElementById('comment_text').value);

    storeRoute('/cms/admin/comments_update/'+id, data);
}
</script>
@endsection
