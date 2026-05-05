@extends('cms.parent')

@section('title','Update Visitor')
@section('main-title','Update Visitor')
@section('sub-title','Update Visitor')

@section('content')

<div class="card card-warning">
    <div class="card-header">
        <h3 class="card-title">Update Visitor</h3>
    </div>

    <div class="card-body">

        {{-- LOCATION --}}
        <div class="form-group">
            <label>Location</label>
            <select class="form-control select2" id="location_id" name="location_id" style="width: 100%;">
                @foreach($locations as $location)
                    <option
                        value="{{ $location->id }}"
                        @if($location->id == optional($visitor->user)->location_id) selected @endif
                    >
                        {{ $location->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <form>

            <div class="row">

                {{-- FIRST NAME --}}
                <div class="col-md-4">
                    <div class="form-group">
                        <label>First Name</label>
                        <input type="text" id="first_name" class="form-control"
                               value="{{ $visitor->user->first_name ?? '' }}">
                    </div>
                </div>

                {{-- LAST NAME --}}
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Last Name</label>
                        <input type="text" id="last_name" class="form-control"
                               value="{{ $visitor->user->last_name ?? '' }}">
                    </div>
                </div>

                {{-- EMAIL --}}
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" id="email" class="form-control"
                               value="{{ $visitor->email ?? '' }}">
                    </div>
                </div>

                {{-- MOBILE --}}
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Mobile</label>
                        <input type="text" id="mobile" class="form-control"
                               value="{{ $visitor->user->mobile ?? '' }}">
                    </div>
                </div>

                {{-- DATE --}}
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Date</label>
                        <input type="date" id="date" class="form-control"
                               value="{{ $visitor->user->date ?? '' }}">
                    </div>
                </div>

                {{-- ADDRESS --}}
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Address</label>
                        <input type="text" id="address" class="form-control"
                               value="{{ $visitor->user->address ?? '' }}">
                    </div>
                </div>

                {{-- GENDER --}}
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Gender</label>
                        <select id="gender" class="form-control">
                            <option value="male" @if(optional($visitor->user)->gender == 'male') selected @endif>Male</option>
                            <option value="female" @if(optional($visitor->user)->gender == 'female') selected @endif>Female</option>
                        </select>
                    </div>
                </div>

                {{-- STATUS --}}
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Status</label>
                        <select id="status" class="form-control">
                            <option value="active" @if(optional($visitor->user)->status == 'active') selected @endif>Active</option>
                            <option value="inactive" @if(optional($visitor->user)->status == 'inactive') selected @endif>Inactive</option>
                        </select>
                    </div>
                </div>

            </div>

            {{-- BUTTONS --}}
            <div class="card-footer">
                <button type="button"
                        onclick="performUpdate({{ $visitor->id }})"
                        class="btn btn-info">
                    Update
                </button>

                <a href="{{ route('visitors.index') }}" class="btn btn-primary">
                    Go Back
                </a>
            </div>

        </form>

    </div>
</div>

@endsection


@section('scripts')

<script>
function performUpdate(id){

    let formData = new FormData();

    formData.append('first_name', document.getElementById('first_name').value);
    formData.append('last_name', document.getElementById('last_name').value);
    formData.append('email', document.getElementById('email').value);
    formData.append('mobile', document.getElementById('mobile').value);
    formData.append('date', document.getElementById('date').value);
    formData.append('address', document.getElementById('address').value);
    formData.append('gender', document.getElementById('gender').value);
    formData.append('status', document.getElementById('status').value);
    formData.append('location_id', document.getElementById('location_id').value);

    axios.post('/cms/admin/visitors_update/' + id, formData)
        .then(function (response) {
            window.location.href = response.data.redirect;
        })
        .catch(function (error) {
            console.log(error.response);
        });

}
</script>

@endsection
