@extends('cms.parent')

@section('title','Trashed Governorates')
@section('main-title','Trashed Governorates')
@section('sub-title','Recycle Bin')

@section('content')

<div class="card">

    <div class="card-header">
        <a href="{{ route('governorates.index') }}" class="btn btn-primary">
            Back
        </a>
    </div>

    <div class="card-body">

        <table class="table table-bordered text-center">

            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Locations</th>
                    <th>Actions</th>
                </tr>
            </thead>

            <tbody>

                @forelse($governorates as $governorate)
                <tr>

                    <td>{{ $governorate->id }}</td>
                    <td>{{ $governorate->name }}</td>

                    <td>
                        <span class="badge bg-info">
                            {{ $governorate->locations_count }}
                        </span>
                    </td>

                    <td>

                        <!-- Restore -->
                        <button onclick="restore({{ $governorate->id }},this)"
                                class="btn btn-success btn-sm">
                            Restore
                        </button>

                        <!-- Force Delete -->
                        <button onclick="forceDelete({{ $governorate->id }},this)"
                                class="btn btn-danger btn-sm">
                            Delete
                        </button>

                    </td>

                </tr>
                @empty

                <tr>
                    <td colspan="4">No Trashed Data</td>
                </tr>

                @endforelse

            </tbody>

        </table>

        {{ $governorates->links() }}

    </div>

</div>

@endsection

@section('scripts')

<script>

function restore(id,ref){
    axios.put('/cms/admin/governorates/' + id + '/restore')
    .then(function (){
        ref.closest('tr').remove();
    });
}

function forceDelete(id,ref){
    if(confirm('Delete forever?')){
        axios.delete('/cms/admin/governorates/force-delete/' + id)
        .then(function (){
            ref.closest('tr').remove();
        });
    }
}

</script>

@endsection
