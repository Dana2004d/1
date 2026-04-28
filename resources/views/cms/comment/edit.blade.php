@extends('cms.parent')

@section('title','Edit Comment')
@section('main-title','Edit Comment')
@section('sub-title','edit comment')



@section('styles')
@endsection

@section('content')
{{-- <div class="card card-warning"> --}}
<div class="card card-warning">
             <div class="card-header">
                <h3 class="card-title">Edit  Comment</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label>Visitor Name</label>
                  <select class="form-control select2" id="visitor_id" name="visitor_id" style="width: 100%;">
                    {{-- <option selected>{{ $comments->visitor->visitor_name ?? "" }}</option> --}}
                    @foreach($visitors as $visitor)

                    {{-- <option value="{{ $visitor->id }}">{{ $visitor->visitor_name }}</option> --}}
                    <option @if ($visitor->id == $comments->visitor_id) selected @endif value="{{ $visitor->id ?? ""}}">
                        {{ $visitor->user->first_name ?? ""}} {{ $visitor->user->last_name ?? ""}}

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
                        <label for="comment_text">comment Text</label>

                        <input
                        type="textarea"
                        class="form-control"
                        id="comment_text"
                        name="comment_text"
                        value="{{ $comments->comment_text }}"
                        >
                      </div>
                    </div>

                  <div class="card-footer">
                  <button type="button" onclick="performUpdate({{ $comments->id }})" class="btn btn-info">Update</button>
                  <a href="{{ route('comments.index') }}"type="submit" class="btn btn-primary">GO BACK</a>
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
        formData.append( 'comment_text',document.getElementById('comment_text').value);
        formData.append( 'visitor_id',document.getElementById('visitor_id').value);

        storeRoute('/cms/admin/comments_update/'+id,formData)




    }



    </script>



@endsection
