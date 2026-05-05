@extends('cms.parent')

@section('title','Comment')
@section('main-title','Index Comment')
@section('sub-title','Index Comment')

@section('styles')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
td .btn {
border-radius: 6px;
width: 36px;
height: 36px;
padding: 0;
margin: 2px;
display: inline-flex;
align-items: center;
justify-content: center;
transition: 0.2s;
}
</style>

@endsection

@section('content')

<section class="content">
<div class="container-fluid">
<div class="row">
<div class="col-md-12">

<div class="card">
<div class="card-header">
<a href="{{ route('comments.create') }}" class="btn btn-primary">ADD NEW Comment</a>
<a href="{{ route('comments.trashed') }}" class="btn btn-dark">
    Trashed
</a>
</div>

<div class="card-body">
<table class="table table-bordered">
<thead>
<tr>
<th>ID</th>
<th>Comment</th>
<th>Visitor</th>
<th>Action</th>
</tr>
</thead>

<tbody>
@foreach ($comments as $comment)
<tr>
<td>{{ $comment->id }}</td>
<td>{{ $comment->comment_text }}</td>
<td>{{ $comment->visitor->user->first_name ?? "" }} {{ $comment->visitor->user->last_name ?? "" }}</td>

<td class="text-center">

<a href="{{ route('comments.show',$comment->id) }}" class="btn btn-info btn-sm">
<i class="fas fa-eye"></i>
</a>

<a href="{{ route('comments.edit',$comment->id) }}" class="btn btn-warning btn-sm">
<i class="fas fa-edit"></i>
</a>

<button onclick="performDestroy({{ $comment->id }},this)" class="btn btn-danger btn-sm">
<i class="fas fa-trash"></i>
</button>

</td>
</tr>
@endforeach
</tbody>
</table>
</div>

{{ $comments->links() }}

</div>
</div>
</div>
</div>
</section>

@endsection

@section('scripts')
<script>
function performDestroy(id,reference){
confirmDestroy('/cms/admin/comments/'+id,reference);
}
</script>
@endsection
