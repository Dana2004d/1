@extends('cms.parent')

@section('title','Show Data of Governorate')
@section('main-title','Show Data of Governorate')
@section('sub-title','Show Data of Governorate')



@section('styles')
@endsection

@section('content')
<div class="card card-warning">
              <div class="card-header">
                <h3 class="card-title"> Show Data of Governorate</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <form>
                  <div class="row">
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label for="name">Governorate Name</label>

                        <input
                        type="text"
                        class="form-control"
                        id="name" disabled
                        name="name"
                        value="{{ $governorates->name }}"
                        >
                      </div>
                    </div>

                    <div class="row">
    <div class="form-group col-md-12">
        {{-- <label>Tags:</label> --}}

        @foreach ($governorates->locations as $location)
            <input type="text" value="{{ $location->name ?? null }}"
                   class="form-control-solid" disabled />
            <span></span>
        @endforeach

    </div>
</div>
                  </div>

                  <div class="card-footer">
                  {{-- <button type="submit" class="btn btn-info">Update</button> --}}
                  <a href="{{ route('governorates.index') }}"type="submit" class="btn btn-primary">GO BACK</a>
                </div>
                </form>
              </div>
              <!-- /.card-body -->
            </div>
@endsection

@section('scripts')

@endsection
