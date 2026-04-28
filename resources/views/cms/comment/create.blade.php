@extends('cms.parent')

@section('title','Create Comment')
@section('main-title','Create Comment')
@section('sub-title','create comment')



@section('styles')
@endsection

@section('content')
{{-- <div class="card card-warning"> --}}
<div class="card card-warning">
             <div class="card-header">
                <h3 class="card-title">Create New Comment</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label>Visitor name</label>
                  <select class="form-control select2" id="visitor_id" name="visitor_id" style="width: 100%;">
                    {{-- <option selected="selected">Alabama</option> --}}
                    @foreach($visitors as $visitor)
                    <option value="{{ $visitor->id }}">{{ $visitor->user->first_name }} {{ $visitor->user->last_name }}</option>
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
                        <label for="comment_text">comment text</label>

                        <input
                        type="textarea"
                        class="form-control"
                        id="comment_text"
                        name="comment_text"
                        >
                      </div>
                    </div>

                  <div class="card-footer">
                  <button type="button" onclick="performStore()" class="btn btn-info">Submit</button>
                  <a href="{{ route('comments.index') }}"type="submit" class="btn btn-primary">GO BACK</a>
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
        formData.append( 'comment_text',document.getElementById('comment_text').value);
        formData.append( 'visitor_id',document.getElementById('visitor_id').value);

        store('/cms/admin/comments',formData)




    }



    </script>



@endsection
