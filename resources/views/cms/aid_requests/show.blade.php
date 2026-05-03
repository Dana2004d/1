@extends('cms.parent')

@section('title','Show Aid Request')
@section('main-title','Aid Requests')
@section('sub-title','Show')

@section('content')
<div class="card card-warning">

    <div class="card-header">
        <h3 class="card-title">Aid Request Details</h3>
    </div>

    <div class="card-body">
        <div class="row">

            <div class="col-md-6">
                <div class="form-group">
                    <label>Name</label>
                    <input type="text" class="form-control" value="{{ $aid_request->name }}" disabled>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label>Phone</label>
                    <input type="text" class="form-control" value="{{ $aid_request->phone }}" disabled>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label>Company</label>
                    <input type="text" class="form-control" value="{{ $aid_request->company_name }}" disabled>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label>Aid Type</label>
                    <input type="text" class="form-control" value="{{ $aid_request->aid_type }}" disabled>
                </div>
            </div>

            <div class="col-md-12">
                <div class="form-group">
                    <label>Link</label>
                    <input type="text" class="form-control" value="{{ $aid_request->link }}" disabled>
                </div>
            </div>

            <div class="col-md-12">
                <div class="form-group">
                    <label>Notes</label>
                    <textarea class="form-control" rows="4" disabled>{{ $aid_request->notes }}</textarea>
                </div>
            </div>

        </div>
    </div>

    <div class="card-footer">
        <a href="{{ route('aid_requests.index') }}" class="btn btn-primary">GO BACK</a>
    </div>

</div>
@endsection
