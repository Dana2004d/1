@extends('cms.parent')

@section('title','Show Category')

@section('content')

<div class="card">

    <div class="card-header">
        <h3>Category Details</h3>
    </div>

    <div class="card-body">

        <div class="mb-3">
            <label>ID</label>
            <input type="text" class="form-control" disabled value="{{ $category->id }}">
        </div>

        <div class="mb-3">
            <label>Name</label>
            <input type="text" class="form-control" disabled value="{{ $category->name }}">
        </div>

        <div class="mb-3">
            <label>Links</label>
            <input type="text" class="form-control" disabled value="{{ $category->links }}">
        </div>

        <div class="mb-3">
            <label>Description</label>
            <textarea class="form-control" disabled>{{ $category->description }}</textarea>
        </div>

        <div class="mb-3">
            <label>Status</label>
            <input type="text" class="form-control" disabled value="{{ $category->status }}">
        </div>

    </div>

    <div class="card-footer">
        <a href="{{ route('categories.index') }}" class="btn btn-primary">
            Back
        </a>
    </div>

</div>

@endsection
