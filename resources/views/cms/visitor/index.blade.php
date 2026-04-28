@extends('cms.parent')

@section('title','Visitor')
@section('main-title','Index Visitor')
@section('sub-title','Index Visitor')



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
    opaVisitor: 0.95;
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
                {{-- <h3 class="card-title">Visitor Table</h3> --}}
                <a href="{{ route('visitors.create') }}"type="submit" class="btn btn-primary">ADD NEW Visitor</a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th style="width: 10px"> ID</th>
                      {{-- <th class="text-center">Image</th> --}}
                      <th class="text-center">First Name</th>
                      <th class="text-center">Last Name</th>
                      <th class="text-center">Email</th>
                      <th class="text-center">Gender</th>
                      <th class="text-center">Status</th>
                      <th class="text-center">Location </th>


                      <th class="text-center",style="width: 40px">Action</th>
                    </tr>
                  </thead>
                  <tbody>

                    @foreach ($visitors as $visitor)


                    <tr>
                      <td>{{ $visitor->id }}</td>
                      <td>{{ $visitor->user->first_name ?? ""}}</td>
                      <td>{{ $visitor->user->last_name ?? ""}}</td>
                      <td>{{ $visitor->email }}</td>
                      {{-- <td>{{ $Visitor->user->gender ?? ""}}</td> --}}
                      <td>

                        @if(optional($visitor->user)->gender == 'male')
                            <span class="badge bg-primary">{{ optional($visitor->user)->gender ?? "" }}</span>
                        @else
                            <span class="badge bg-info">{{ optional($visitor->user)->gender ?? "" }}</span>
                        @endif

                        </td>

                      {{-- <td>{{ $Visitor->user->status ?? ""}}</td> --}}
                      <td>
                      @if (optional($visitor->user)->status == 'active')
                      <span class="badge bg-success">
                        {{ optional ($visitor->user)->status ?? "" }}
                     </span>
                     @else
                    <span class="badge bg-danger">
                        {{ optional ($visitor->user)->status }}
                     </span>
                    @endif
                    </td>






                      <td>
                        <span class="badge bg-info">
                       {{ $visitor->user->location->name ?? "" }}
                      </td>
                      {{-- <td>Action</td> --}}
                      <td class="text-center">

    <!-- Show -->
    <a href="{{ route('visitors.show', $visitor->id) }}"
       class="btn btn-info btn-sm"
       title="Show Data">
        <i class="fas fa-eye"></i>
    </a>

    <!-- Edit -->
    <a href="{{ route('visitors.edit', $visitor->id) }}"
       class="btn btn-warning btn-sm"
       title="Edit Data">
        <i class="fas fa-edit"></i>
    </a>

    <!-- Delete -->
    <form action="{{ route('visitors.destroy', $visitor->id) }}"
          method="POST"
          style="display:inline-block;">
        @csrf
        @method('DELETE')

        <button type="button" onclick="performDestroy({{ $visitor->id }} , this )"class="btn btn-danger btn-sm" title="Delete Data">


            <i class="fas fa-trash"></i>
        </button>
    </form>

</td>
                    </tr>

                     @endforeach
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
              {{-- <div class="card-footer clearfix">
                <ul class="pagination pagination-sm m-0 float-right">
                  <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
                  <li class="page-item"><a class="page-link" href="#">1</a></li>
                  <li class="page-item"><a class="page-link" href="#">2</a></li>
                  <li class="page-item"><a class="page-link" href="#">3</a></li>
                  <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
                </ul>
              </div> --}}
              {{ $visitors->links() }}
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
        confirmDestroy('/cms/admin/visitors/'+id,reference);




    }



    </script>
@endsection
