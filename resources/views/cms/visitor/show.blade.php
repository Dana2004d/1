@extends('cms.parent')

@section('title','Show Data of Visitor')
@section('main-title','Show Data of Visitor')
@section('sub-title','Show Data of Visitor')



@section('styles')
@endsection

@section('content')
<div class="card card-warning">
              <div class="card-header">
                <h3 class="card-title"> Show Data of Visitor</h3>
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
                        value="{{ $visitors->user->first_name }}"
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
                        value="{{ $visitors->user->last_name }}"
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
                        value="{{ $visitors->email }}"
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
                        value="{{ $visitors->user->gender }}"
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
                        value="{{ $visitors->user->status }}"
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
                        value="{{ $visitors->user->location->name }}"
                         >
                      </div>
                    </div>
                  </div>
                  {{-- <div class="row">
                    <div class="col-sm-6">
                      <!-- textarea -->
                      <div class="form-group">
                        <label>Textarea</label>
                        <textarea class="form-control" rows="3" placeholder="Enter ..."></textarea>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Textarea Disabled</label>
                        <textarea class="form-control" rows="3" placeholder="Enter ..." disabled></textarea>
                      </div>
                    </div>
                  </div> --}}

                  <!-- input states -->
                  {{-- <div class="form-group">
                    <label class="col-form-label" for="inputSuccess"><i class="fas fa-check"></i> Input with
                      success</label>
                    <input type="text" class="form-control is-valid" id="inputSuccess" placeholder="Enter ...">
                  </div> --}}
                  {{-- <div class="form-group">
                    <label class="col-form-label" for="inputWarning"><i class="far fa-bell"></i> Input with
                      warning</label>
                    <input type="text" class="form-control is-warning" id="inputWarning" placeholder="Enter ...">
                  </div> --}}
                  {{-- <div class="form-group">
                    <label class="col-form-label" for="inputError"><i class="far fa-times-circle"></i> Input with
                      error</label>
                    <input type="text" class="form-control is-invalid" id="inputError" placeholder="Enter ...">
                  </div> --}}

                  {{-- <div class="row">
                    <div class="col-sm-6">
                      <!-- checkbox -->
                      <div class="form-group">
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox">
                          <label class="form-check-label">Checkbox</label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" checked>
                          <label class="form-check-label">Checkbox checked</label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" disabled>
                          <label class="form-check-label">Checkbox disabled</label>
                        </div>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <!-- radio -->
                      <div class="form-group">
                        <div class="form-check">
                          <input class="form-check-input" type="radio" name="radio1">
                          <label class="form-check-label">Radio</label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="radio" name="radio1" checked>
                          <label class="form-check-label">Radio checked</label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="radio" disabled>
                          <label class="form-check-label">Radio disabled</label>
                        </div>
                      </div>
                    </div>
                  </div> --}}

                  {{-- <div class="row">
                    <div class="col-sm-6">
                      <!-- select -->
                      <div class="form-group">
                        <label>Select</label>
                        <select class="form-control">
                          <option>option 1</option>
                          <option>option 2</option>
                          <option>option 3</option>
                          <option>option 4</option>
                          <option>option 5</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Select Disabled</label>
                        <select class="form-control" disabled>
                          <option>option 1</option>
                          <option>option 2</option>
                          <option>option 3</option>
                          <option>option 4</option>
                          <option>option 5</option>
                        </select>
                      </div>
                    </div>
                  </div> --}}

                  {{-- <div class="row">
                    <div class="col-sm-6">
                      <!-- Select multiple-->
                      <div class="form-group">
                        <label>Select Multiple</label>
                        <select multiple class="form-control">
                          <option>option 1</option>
                          <option>option 2</option>
                          <option>option 3</option>
                          <option>option 4</option>
                          <option>option 5</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Select Multiple Disabled</label>
                        <select multiple class="form-control" disabled>
                          <option>option 1</option>
                          <option>option 2</option>
                          <option>option 3</option>
                          <option>option 4</option>
                          <option>option 5</option>
                        </select>
                      </div>
                    </div>
                  </div> --}}
                  <div class="card-footer">
                  {{-- <button type="submit" class="btn btn-info">Update</button> --}}
                  <a href="{{ route('visitors.index') }}"type="submit" class="btn btn-primary">GO BACK</a>
                </div>
                </form>
              </div>
              <!-- /.card-body -->
            </div>
@endsection

@section('scripts')

@endsection
