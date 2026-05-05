@extends('cms.parent')

@section('title','Show Data of Location')
@section('main-title','Show Data of Location')
@section('sub-title','Show Data of Location')



@section('styles')
@endsection

@section('content')
<div class="card card-warning">
              <div class="card-header">
                <h3 class="card-title"> Show Data of Location</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <form>
                  <div class="row">

                    <div class="col-sm-12">
                      <!-- text input -->
                      <div class="form-group">
                        <label for="name">Location Name</label>

                        <input
                        type="text"
                        class="form-control"
                        id="name" disabled
                        name="name"
                        value="{{ $location->name }}"
                        >
                      </div>

                  </div>


                  <div class="card-footer">
                  {{-- <button type="submit" class="btn btn-info">Update</button> --}}
                  <a href="{{ route('locations.index') }}"type="submit" class="btn btn-primary">GO BACK</a>
                </div>
                </form>
              </div>
              <!-- /.card-body -->
            </div>
@endsection

@section('scripts')

@endsection
