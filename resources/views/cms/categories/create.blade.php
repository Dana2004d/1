@extends('cms.parent')

@section('title','Create Category')
@section('main-title','Categories')
@section('sub-title','Create')

@section('content')

<div class="card card-warning">

    <div class="card-header">
        <h3 class="card-title">Create Category</h3>
    </div>

    <div class="card-body">

        {{-- 🔴 Error Messages --}}
        <div id="error_alert" class="alert alert-danger" hidden>
            <ul id="error_messages_ul"></ul>
        </div>

        {{-- 🔥 مهم جدًا: form + id --}}
        <form id="create_form">

            <div class="row">

                <div class="col-md-6">
                    <label>Name</label>
                    <input id="name" type="text" class="form-control" placeholder="Enter Name">
                </div>

                <div class="col-md-6">
                    <label>Status</label>
                    <select id="status" class="form-control">
                        <option value="active">Active</option>
                        <option value="inactive">Inactive</option>
                    </select>
                </div>

                <div class="col-md-12 mt-3">
                    <label>Description</label>
                    <textarea id="description" class="form-control" placeholder="Enter Description"></textarea>
                </div>

            </div>

        </form>

    </div>

    <div class="card-footer d-flex justify-content-between">

        {{-- 🔥 زر Save --}}
        <button type="button" onclick="performStore()" class="btn btn-success">
            <i class="fas fa-save"></i> Save
        </button>

        {{-- 🔥 زر Back --}}
        <a href="{{ route('categories.index') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left"></i> Back
        </a>

    </div>

</div>

@endsection

@section('scripts')
<script>

function performStore(){

    let data = new FormData();

    data.append('name', document.getElementById('name').value);
    data.append('description', document.getElementById('description').value);
    data.append('status', document.getElementById('status').value);

    store('/cms/admin/categories', data);
}

</script>
@endsection
