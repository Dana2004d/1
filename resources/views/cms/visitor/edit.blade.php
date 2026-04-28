@extends('cms.parent')

@section('title','Update Visitor')
@section('main-title','Update Visitor')
@section('sub-title','update visitor')



@section('styles')
@endsection

@section('content')
{{-- <div class="card card-warning"> --}}
<div class="card card-warning">
             <div class="card-header">
                <h3 class="card-title">Update Visitor</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label>Location</label>
                  <select class="form-control select2" id="location_id" name="location_id" style="width: 100%;">
                    {{-- <option selected="selected">Alabama</option> --}}
                    @foreach($locations as $location)

                    {{-- <option value="{{ $country->id }}">{{ $country->country_name }}</option> --}}
                    <option @if ($location->id == $visitors->user->location->location_id) selected @endif value="{{ $location->id ?? ""}}">
                        {{ $location->name ?? ""}}

                    </option>
                    @endforeach

                  </select>
                </div>
                <!-- /.form-group -->

                <!-- /.form-group -->
              </div>
              <!-- /.col -->

              <!-- /.col -->
            </div>
                <form>
                  <div class="row">
                    <div class="col-md-4">
                      <!-- text input -->
                      <div class="form-group">
                        <label for="first_name">First Name</label>

                        <input
                        type="text"
                        class="form-control"
                        id="first_name"
                        name="first_name"
                        value="{{ $visitors->user->first_name }}"
                        >
                      </div>
                    </div>
                    <div class="col-md-4">
                      <!-- text input -->
                      <div class="form-group">
                        <label for="last_name">Last Name</label>

                        <input
                        type="text"
                        class="form-control"
                        id="last_name"
                        name="last_name"
                        value="{{ $visitors->user->last_name }}"
                        >
                      </div>
                    </div>
                    <div class="col-md-4">
                      <!-- text input -->
                      <div class="form-group">
                        <label for="email">Email</label>

                        <input
                        type="email"
                        class="form-control"
                        id="email"
                        name="email"
                        value="{{ $visitors->email }}"
                        >
                      </div>
                    </div>

                    <div class="col-md-4">
                      <!-- text input -->
                      <div class="form-group">
                        <label for="mobile">Mobile</label>

                        <input
                        type="text"
                        class="form-control"
                        id="mobile"
                        name="mobile"
                        value="{{ $visitors->user->mobile }}"
                        >
                      </div>
                    </div>
                     <div class="col-md-4">
                      <!-- text input -->
                      <div class="form-group">
                        <label for="date">Date</label>

                        <input
                        type="date"
                        class="form-control"
                        id="date"
                        name="date"
                        value="{{ $visitors->user->date }}"
                        >
                      </div>
                    </div>
                     <div class="col-md-12">
                      <!-- text input -->
                      <div class="form-group">
                        <label for="address">Address</label>

                        <input
                        type="text"
                        class="form-control"
                        id="address"
                        name="address"
                        value="{{ $visitors->user->address }}"
                        >
                      </div>
                    </div>
                {{-- <div class="row"> --}}

    <div class="form-group col-md-6">
        <label for="gender">Gender</label>
        <select name="gender" id="gender" class="form-select form-select-sm" style="width: 100%;">
            <option selected hidden> {{ $visitors->user->gender }} </option>
            <option value="male">Male</option>
            <option value="female">Female</option>
        </select>
    </div>

    <div class="form-group col-md-6">
        <label for="status">Status</label>
        <select name="status" id="status" class="form-select form-select-sm" style="width: 100%;">
            <option selected hidden> {{ $visitors->user->status }} </option>
            <option value="active">Active</option>
            <option value="inactive">InActive</option>
        </select>
    </div>

</div>





                  <div class="card-footer">
                  <button type="button" onclick="performUpdate({{ $visitors->id }})" class="btn btn-info">Update</button>
                  <a href="{{ route('visitors.index') }}"type="submit" class="btn btn-primary">GO BACK</a>
                </div>
                </form>
              </div>
              <!-- /.card-body -->
            </div>
@endsection

@section('scripts')

<script>
    function performUpdate(id){
        let formData = new FormData();
        formData.append( 'first_name',document.getElementById('first_name').value);
        formData.append( 'last_name',document.getElementById('last_name').value);
        formData.append( 'location_id',document.getElementById('location_id').value);
        formData.append( 'email',document.getElementById('email').value);
        // formData.append( 'password',document.getElementById('password').value);
        formData.append( 'address',document.getElementById('address').value);
        formData.append( 'mobile',document.getElementById('mobile').value);
        formData.append( 'gender',document.getElementById('gender').value);
        formData.append( 'status',document.getElementById('status').value);
        formData.append( 'date',document.getElementById('date').value);
       // formData.append( 'image',document.getElementById('image').files[0]);

        storeRoute('/cms/admin/visitors_update/' +id ,formData);




    }



    </script>



@endsection
