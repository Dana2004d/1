@extends('cms.parent')

@section('title','Show Data of Admin')
@section('main-title','Show Data of Admin')
@section('sub-title','Show Data of admin')



@section('styles')
@endsection

@section('content')
<div class="card card-warning">
              <div class="card-header">
                <h3 class="card-title"> Show Data of Admin</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <form>
                  <div class="row">
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label for="first_name">First Name</label>

                        <input
                        type="text"
                        class="form-control"
                        id="first_name" disabled
                        name="first_name"
                        value="{{ $admins->user->first_name }}"
                        >
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="last_name">Last Name</label>
                        <input type="text"
                         class="form-control"
                         id="last_name" disabled
                        name="last_name"
                        value="{{ $admins->user->last_name }}"
                         >
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text"
                         class="form-control"
                         id="email" disabled
                        name="email"
                        value="{{ $admins->email }}"
                         >
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="gender">Gender</label>
                        <input type="text"
                         class="form-control"
                         id="gender" disabled
                        name="gender"
                        value="{{ $admins->user->gender }}"
                         >
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="status">status</label>
                        <input type="text"
                         class="form-control"
                         id="status" disabled
                        name="status"
                        value="{{ $admins->user->status }}"
                         >
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="location">Location </label>
                        <input type="text"
                         class="form-control"
                         id="location" disabled
                        name="location"
                        value="{{ $admins->user->location->name }}"
                         >
                      </div>
                    </div>
                  </div>
                 
                  <div class="card-footer">
                  {{-- <button type="submit" class="btn btn-info">Update</button> --}}
                  <a href="{{ route('admins.index') }}"type="submit" class="btn btn-primary">GO BACK</a>
                </div>
                </form>
              </div>
              <!-- /.card-body -->
            </div>
@endsection

@section('scripts')

@endsection
