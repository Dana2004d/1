@extends('cms.parent')

@section('title','Governorate')
@section('main-title','Index Governorate')
@section('sub-title','Index Governorate')



@section('styles')

<!-- Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

<!-- Bootstrap -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Custom CSS -->
<style>
    td .btn {
    border-radius: 6px;
    width: 36px;
    height: 36px;
    padding: 0;
    margin: 2px;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    transition: all 0.2s ease-in-out;
}

td .btn i {
    font-size: 14px;
    pointer-events: none;
}

td .btn:hover {
    transform: scale(1.08);
    opacity: 0.95;
    box-shadow: 0 2px 6px rgba(0,0,0,0.2);
}

td.text-center {
    white-space: nowrap;
}
</style>


@endsection

@section('content')
{{-- <h1> This is Index view </h1> --}}

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                {{-- <h3 class="card-title">Governorate Table</h3> --}}
                <a href="{{ route('governorates.create') }}"type="submit" class="btn btn-primary">ADD NEW Governorate</a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th style="width: 10px"> ID</th>
                      <th class="text-center">Governorate Name</th>

                      <th class="text-center">Number of Locations</th>

                      <th class="text-center",style="width: 40px">Action</th>
                    </tr>
                  </thead>
                  <tbody>

                    @foreach ($governorates as $governorate)


                    <tr>
                      <td>{{ $governorate->id }}</td>
                      <td>{{ $governorate->name }}</td>

                      <td><span class="badge bg-info">{{ $governorate->locations_count }}</td>

                      {{-- <td>Action</td> --}}
                      <td class="text-center">

    <!-- Show -->
    <a href="{{ route('governorates.show', $governorate->id) }}"
       class="btn btn-info btn-sm"
       title="Show Data">
        <i class="fas fa-eye"></i>
    </a>

    <!-- Edit -->
    <a href="{{ route('governorates.edit', $governorate->id) }}"
       class="btn btn-warning btn-sm"
       title="Edit Data">
        <i class="fas fa-edit"></i>
    </a>

    <!-- Delete -->
    <form action="{{ route('governorates.destroy', $governorate->id) }}"
          method="POST"
          style="display:inline-block;">
        @csrf
        @method('DELETE')

        <button type="button" onclick="performDestroy({{ $governorate->id }} , this )"class="btn btn-danger btn-sm" title="Delete Data">


            <i class="fas fa-trash"></i>
        </button>
    </form>

</td>
                    </tr>

                     @endforeach
                  </tbody>
                </table>
              </div>
           
              {{ $governorates->links() }}
            </div>
            <!-- /.card -->


            <!-- /.card -->
          </div>
          <!-- /.col -->

          <!-- /.col -->
        </div>
        <!-- /.row -->
        <div class="row">

        </div>
        <!-- /.row -->
        <div class="row">

        </div>
        <!-- /.row -->
        <div class="row">

        </div>
        <!-- /.row -->
        <div class="row">

        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection

@section('scripts')
<script>
    function performDestroy(id,reference){
        confirmDestroy('/cms/admin/governorates/'+id,reference);




    }



    </script>
@endsection
