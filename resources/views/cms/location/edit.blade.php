@extends('cms.parent')

@section('title','Edit Location')
@section('main-title','Edit Location')
@section('sub-title','edit location')



@section('styles')
@endsection

@section('content')
{{-- <div class="card card-warning"> --}}
<div class="card card-warning">
             <div class="card-header">
                <h3 class="card-title">Edit  Location</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label>Governorate</label>
                  <select class="form-control select2" id="governorate_id" name="governorate_id" style="width: 100%;">
                    {{-- <option selected>{{ $locations->governorate->governorate_name ?? "" }}</option> --}}
                    @foreach($governorates as $governorate)

                    {{-- <option value="{{ $governorate->id }}">{{ $governorate->governorate_name }}</option> --}}
                    <option @if ($governorate->id == $locations->governorate_id) selected @endif value="{{ $governorate->id ?? ""}}">
                        {{ $governorate->name ?? ""}}

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
                    <div class="col-sm-12">
                      <!-- text input -->
                      <div class="form-group">
                        <label for="name">Location Name</label>

                        <input
                        type="text"
                        class="form-control"
                        id="name"
                        name="name"
                        value="{{ $locations->name }}"
                        >
                      </div>
                    </div>

                  <div class="card-footer">
                  <button type="button" onclick="performUpdate({{ $locations->id }})" class="btn btn-info">Update</button>
                  <a href="{{ route('locations.index') }}"type="submit" class="btn btn-primary">GO BACK</a>
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
        formData.append( 'name',document.getElementById('name').value);
        formData.append( 'governorate_id',document.getElementById('governorate_id').value);

        storeRoute('/cms/admin/locations_update/'+id,formData)




    }



    </script>



@endsection
