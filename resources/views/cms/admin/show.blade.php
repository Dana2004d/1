@extends('cms.parent')

@section('title','Show Admin')
@section('main-title','Show Admin')
@section('sub-title','Show Admin')

@section('content')

<div class="card card-warning">
    <div class="card-header">
        <h3 class="card-title">Show Admin Data</h3>
    </div>

    <div class="card-body">

        <form>

            <div class="row">

                <div class="col-sm-6">
                    <label>First Name</label>
                    <input type="text" class="form-control" disabled
                           value="{{ $admin->user->first_name ?? '' }}">
                </div>

                <div class="col-sm-6">
                    <label>Last Name</label>
                    <input type="text" class="form-control" disabled
                           value="{{ $admin->user->last_name ?? '' }}">
                </div>

                <div class="col-sm-6">
                    <label>Email</label>
                    <input type="text" class="form-control" disabled
                           value="{{ $admin->email ?? '' }}">
                </div>

                <div class="col-sm-6">
                    <label>Gender</label>
                    <input type="text" class="form-control" disabled
                           value="{{ $admin->user->gender ?? '' }}">
                </div>

                <div class="col-sm-6">
                    <label>Status</label>
                    <input type="text" class="form-control" disabled
                           value="{{ $admin->user->status ?? '' }}">
                </div>

                <div class="col-sm-6">
                    <label>Location</label>
                    <input type="text" class="form-control" disabled
                           value="{{ $admin->user->location->name ?? '' }}">
                </div>

            </div>

        </form>

    </div>

    <div class="card-footer">
        <a href="{{ route('admins.index') }}" class="btn btn-primary">
            GO BACK
        </a>
    </div>

</div>

@endsection
