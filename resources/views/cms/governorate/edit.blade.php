@extends('cms.parent')

@section('title','Edit Governorate')
@section('main-title','Edit Governorate')
@section('sub-title','edit governorate')



@section('styles')
@endsection

@section('content')
<div class="card card-warning">
              <div class="card-header">
                <h3 class="card-title"> Edit Data of Governorate</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <form>
                  <div class="row">
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label for="name">Governorates Name</label>

                        <input
                        type="text"
                        class="form-control"
                        id="name"
                        name="name"
                        value="{{ $governorates->name }}"
                        >
                      </div>
                    </div>

                  </div>

                  <div class="card-footer">
                  <button type="button" onclick="performUpdate({{ $governorates->id }})" class="btn btn-info">Update</button>
                  <a href="{{ route('governorates.index') }}"type="submit" class="btn btn-primary">GO BACK</a>
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
        formData.append('name',document.getElementById('name').value);

        storeRoute('/cms/admin/governorates_update/'+id ,formData)


    }




    </script>
@endsection
