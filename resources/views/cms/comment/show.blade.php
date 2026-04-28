@extends('cms.parent')

@section('title','Show Data of Comment')
@section('main-title','Show Data of Comment')
@section('sub-title','Show Data of Comment')



@section('styles')
@endsection

@section('content')
<div class="card card-warning">
              <div class="card-header">
                <h3 class="card-title"> Show Data of Comment</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <form>
                  <div class="row">
                   
                    <div class="col-sm-12">
                      <!-- text input -->
                      <div class="form-group">
                        <label for="comment_text">comment text</label>

                        <input
                        type="textarea"
                        class="form-control"
                        id="comment_text" disabled
                        name="comment_text"
                        value="{{ $comments->comment_text }}"
                        >
                      </div>

                  </div>


                  <div class="card-footer">
                  {{-- <button type="submit" class="btn btn-info">Update</button> --}}
                  <a href="{{ route('comments.index') }}"type="submit" class="btn btn-primary">GO BACK</a>
                </div>
                </form>
              </div>
              <!-- /.card-body -->
            </div>
@endsection

@section('scripts')

@endsection
