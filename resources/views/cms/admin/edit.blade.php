@extends('cms.parent')

@section('title','Update Admin')

@section('content')

<div class="card shadow-sm">

    <div class="card-header bg-warning text-white">
        <h4 class="mb-0">Update Admin</h4>
    </div>

    <div class="card-body">

        <form>

            <div class="row g-3">

                <!-- Location -->
                <div class="col-md-12">
                    <label class="form-label">Location</label>
                    <select class="form-control" id="location_id">

                        @foreach($locations as $location)
                            <option
                                value="{{ $location->id }}"
                                @if($location->id == optional($admin->user)->location_id) selected @endif
                            >
                                {{ $location->name }}
                            </option>
                        @endforeach

                    </select>
                </div>

                <!-- First Name -->
                <div class="col-md-4">
                    <label>First Name</label>
                    <input type="text" id="first_name" class="form-control"
                           value="{{ $admin->user->first_name ?? '' }}">
                </div>

                <!-- Last Name -->
                <div class="col-md-4">
                    <label>Last Name</label>
                    <input type="text" id="last_name" class="form-control"
                           value="{{ $admin->user->last_name ?? '' }}">
                </div>

                <!-- Email -->
                <div class="col-md-4">
                    <label>Email</label>
                    <input type="email" id="email" class="form-control"
                           value="{{ $admin->email ?? '' }}">
                </div>

                <!-- Mobile -->
                <div class="col-md-4">
                    <label>Mobile</label>
                    <input type="text" id="mobile" class="form-control"
                           value="{{ $admin->user->mobile ?? '' }}">
                </div>

                <!-- Date -->
                <div class="col-md-4">
                    <label>Date</label>
                    <input type="date" id="date" class="form-control"
                           value="{{ $admin->user->date ?? '' }}">
                </div>

                <!-- Address -->
                <div class="col-md-12">
                    <label>Address</label>
                    <input type="text" id="address" class="form-control"
                           value="{{ $admin->user->address ?? '' }}">
                </div>

                <!-- Gender -->
                <div class="col-md-6">
                    <label>Gender</label>
                    <select id="gender" class="form-control">
                        <option value="male" @if(optional($admin->user)->gender=='male') selected @endif>Male</option>
                        <option value="female" @if(optional($admin->user)->gender=='female') selected @endif>Female</option>
                    </select>
                </div>

                <!-- Status -->
                <div class="col-md-6">
                    <label>Status</label>
                    <select id="status" class="form-control">
                        <option value="active" @if(optional($admin->user)->status=='active') selected @endif>Active</option>
                        <option value="inactive" @if(optional($admin->user)->status=='inactive') selected @endif>Inactive</option>
                    </select>
                </div>

            </div>

        </form>

    </div>

    <div class="card-footer text-end">

        <button onclick="performUpdate({{ $admin->id }})"
                class="btn btn-warning">
            Update
        </button>

        <a href="{{ route('admins.index') }}" class="btn btn-secondary">
            Back
        </a>

    </div>

</div>

@endsection
