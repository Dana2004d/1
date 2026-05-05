@extends('cms.parent')

@section('content')
<div class="card">
<div class="card-body">

<input id="name" class="form-control mb-2" placeholder="Name">
<input id="phone" class="form-control mb-2" placeholder="Phone">

<select id="aid_type" class="form-control mb-2">
<option value="food">Food</option>
<option value="medical">Medical</option>
<option value="financial">Financial</option>
<option value="other">Other</option>
</select>

<select id="category_id" class="form-control mb-2">
@foreach($categories as $c)
<option value="{{ $c->id }}">{{ $c->name }}</option>
@endforeach
</select>

<select id="visitors" class="form-control mb-2" multiple>
@foreach($visitors as $v)
<option value="{{ $v->id }}">
{{ optional($v->user)->first_name }} {{ optional($v->user)->last_name }}
</option>
@endforeach
</select>

<textarea id="notes" class="form-control mb-2"></textarea>

<button onclick="storeAid()" class="btn btn-success">Save</button>
 <div class="card-footer">
        <a href="{{ route('aid_requests.index') }}" class="btn btn-primary">GO BACK</a>
    </div>
</div>
</div>
@endsection

@section('scripts')
<script>
function storeAid(){
let data = new FormData();

data.append('name', name.value);
data.append('phone', phone.value);
data.append('aid_type', aid_type.value);
data.append('category_id', category_id.value);
data.append('notes', notes.value);

let visitors = $('#visitors').val();
for(let i=0;i<visitors.length;i++){
    data.append('visitors[]', visitors[i]);
}

axios.post('/cms/admin/aid_requests', data)
.then(()=> window.location='/cms/admin/aid_requests');
}
</script>
@endsection
