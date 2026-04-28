@extends('cms.parent')

@section('title','Create Location')
@section('main-title','Create Location')
@section('sub-title','create location')



@section('styles')
@endsection

@section('content')
{{-- <div class="card card-warning"> --}}
<div class="card card-warning">
             <div class="card-header">
                <h3 class="card-title">Create New Location</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label>Governorate</label>
                  <select class="form-control " id="governorate_id" name="governorate_id" style="width: 100%;">

@foreach($governorates as $governorate)
<option value="{{ $governorate->id }}">
    {{ $governorate->name }}
</option>
@endforeach

</select>
                 </div>
                 {{-- <div class="form-group"> --}}
{{-- <label>المحافظة</label> --}}

{{-- <select id="governorate" class="form-control">
    <option selected disabled>اختر المحافظة</option>


    <option value="north">شمال غزة</option>
     <option value="gaza">غزة</option>
    <option value="deir">دير البلح</option>
    <option value="khan">خانيونس</option>
    <option value="rafah">رفح</option>
</select> --}}
{{-- </div> --}}
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
                      {{-- <div class="form-group">
                        <label for="name">Location Name</label>

                        <input
                        type="text"
                        class="form-control"
                        id="name"
                        name="name"
                        >
                      </div> --}}
                      <div class="form-group">
<label>location</label>

<select name="name" id="location" class="form-control">
    <option selected disabled>اختر المنطقة</option>
</select>

</div>
                    </div>

                  <div class="card-footer">
                  <button type="button" onclick="performStore()" class="btn btn-info">Submit</button>
                  <a href="{{ route('locations.index') }}"type="submit" class="btn btn-primary">GO BACK</a>
                </div>
                </form>
              </div>
              <!-- /.card-body -->
            </div>
@endsection

@section('scripts')

<script>

window.onload = function () {

    const governorate = document.getElementById('governorate_id');
    const location = document.getElementById('location');

    function loadLocations() {

        let selectedName =
        governorate.options[governorate.selectedIndex].text.trim();

        let data = {

            'شمال غزة': ['جباليا','بيت لاهيا','بيت حانون'],
            'غزة': ['غزة','الرمال','الشجاعية'],
            'دير البلح': ['دير البلح','النصيرات'],
            'خانيونس': ['خانيونس','عبسان'],
            'رفح': ['رفح','تل السلطان']

        };

        location.innerHTML =
        '<option selected disabled>اختر المنطقة</option>';

        if(data[selectedName]){

            data[selectedName].forEach(function(item){

                location.innerHTML +=
                '<option value="'+item+'">'+item+'</option>';

            });

        }

    }

    governorate.onchange = loadLocations;

    loadLocations(); // مهم جدًا

};


function performStore(){

    let formData = new FormData();

    formData.append(
        'name',
        document.getElementById('location').value
    );

    formData.append(
        'governorate_id',
        document.getElementById('governorate_id').value
    );

    store('/cms/admin/locations', formData);
}

</script>

@endsection
