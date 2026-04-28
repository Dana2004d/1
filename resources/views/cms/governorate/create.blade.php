@extends('cms.parent')

@section('title','Create Governorate')
@section('main-title','Create Governorate')
@section('sub-title','create governorate')



@section('styles')
@endsection

@section('content')
<div class="card card-warning">
              <div class="card-header">
                <h3 class="card-title">Create New Governorate</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <form>
                  <div class="row">
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label for="Governorate_name">Governorate Name</label>

                        <select name="name" id="name" class="form-control">
    <option selected disabled>Choose Governorate</option>


    <option value="شمال غزة">شمال غزة</option>
    <option value="غزة">غزة</option>
    <option value="دير البلح">دير البلح</option>
    <option value="خانيونس">خانيونس</option>
    <option value="رفح">رفح</option>
</select>
                      </div>
                    </div>

                  </div>
                  <div class="card-footer">
                  <button type="button" onclick="performStore()" class="btn btn-info">Submit</button>
                  <a href="{{ route('governorates.index') }}"type="submit" class="btn btn-primary">GO BACK</a>
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
        formData.append('name',document.getElementById('name').value);
        store('/cms/admin/governorates',formData)




    }



    </script>



@endsection
