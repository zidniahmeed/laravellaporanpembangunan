@extends('admin.templates.index')

@section('page-content')
<div class="container">
    <h2>Edit Kelurahan</h2>
    <form action="{{ route('kelurahan.update', $kelurahan->idkelurahan) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        @include('kelurahan.form', ['mode' => 'edit'])

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection

