@extends('cms.parent')

@section('title','Create Visitor')
@section('main-title','Create Visitor')
@section('sub-title','create visitor')



@section('styles')
@endsection

@section('content')
{{-- <div class="card card-warning"> --}}
<div class="card card-warning">
             <div class="card-header">
                <h3 class="card-title">Create New Visitor</h3>
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
                    <option value="{{ $location->id }}">{{ $location->name }}</option>
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
                        >
                      </div>
                    </div>
                    <div class="col-md-4">
                      <!-- text input -->
                      <div class="form-group">
                        <label for="password">Password</label>

                        <input
                        type="password"
                        class="form-control"
                        id="password"
                        name="password"
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
                        >
                      </div>
                    </div>
                {{-- <div class="row"> --}}

    <div class="form-group col-md-6">
        <label for="gender">Gender</label>
        <select name="gender" id="gender" class="form-select form-select-sm" style="width: 100%;">
            <option value="male">Male</option>
            <option value="female">Female</option>
        </select>
    </div>

    <div class="form-group col-md-6">
        <label for="status">Status</label>
        <select name="status" id="status" class="form-select form-select-sm" style="width: 100%;">
            <option value="active">Active</option>
            <option value="inactive">InActive</option>
        </select>
    </div>

</div>
{{-- <div class="row"> --}}
   <div class="col-md-12">
                      <!-- text input -->
                      <div class="form-group">
                        <label for="image">Choose Image</label>

                        <input
                        type="file"
                        class="form-control"
                        id="image"
                        name="image"
                        >
                      </div>
                    </div>
{{-- </div> --}}




                  <div class="card-footer">
                  <button type="button" onclick="performStore()" class="btn btn-info">Submit</button>
                  <a href="{{ route('visitors.index') }}"type="submit" class="btn btn-primary">GO BACK</a>
                </div>
                </form>
              </div>
              <!-- /.card-body -->
            </div>
@endsection

@section('scripts')

<script>
    function performStore(){
        let formData = new FormData();
        formData.append( 'first_name',document.getElementById('first_name').value);
        formData.append( 'last_name',document.getElementById('last_name').value);
        formData.append( 'location_id',document.getElementById('location_id').value);
        formData.append( 'email',document.getElementById('email').value);
        formData.append( 'password',document.getElementById('password').value);
        formData.append( 'address',document.getElementById('address').value);
        formData.append( 'mobile',document.getElementById('mobile').value);
        formData.append( 'gender',document.getElementById('gender').value);
        formData.append( 'status',document.getElementById('status').value);
        formData.append( 'date',document.getElementById('date').value);
       // formData.append( 'image',document.getElementById('image').files[0]);

        store('/cms/admin/visitors',formData)




    }



    </script>



@endsection
