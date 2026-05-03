@extends('cms.parent')

@section('title','Trashed Aid Requests')
@section('main-title','Aid Requests')
@section('sub-title','Trashed')

@section('content')
<div class="card">

    <div class="card-header">
        <h3 class="card-title">Trashed Aid Requests</h3>
    </div>

    <div class="card-body">
        <table class="table table-bordered text-center">

            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Phone</th>
                    <th>Type</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody>
                @foreach($aid_requests as $a)
                <tr>
                    <td>{{ $a->id }}</td>
                    <td>{{ $a->name }}</td>
                    <td>{{ $a->phone }}</td>
                    <td>
                        <span class="badge bg-info">{{ $a->aid_type }}</span>
                    </td>

                    <td>

                        <!-- Restore -->
                        <a href="{{ route('aid_requests.restore',$a->id) }}"
                           class="btn btn-success btn-sm">
                            <i class="fas fa-undo"></i>
                        </a>

                        <!-- Force Delete -->
                        <button onclick="forceDelete({{ $a->id }},this)"
                                class="btn btn-danger btn-sm">
                            <i class="fas fa-times"></i>
                        </button>

                    </td>
                </tr>
                @endforeach
            </tbody>

        </table>
    </div>
</div>
@endsection

@section('scripts')
<script>
function forceDelete(id,ref){
    confirmDestroy('/cms/admin/aid_requests/force-delete/'+id,ref);
}
</script>
@endsection
