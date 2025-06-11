@extends('admin.templates.index')

@section('page-content')
<div class="container">
    <h2>Tambah Kelurahan</h2>
    <form action="{{ route('kelurahan.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        @include('kelurahan.form', ['mode' => 'create'])

        <button type="submit" class="btn btn-success">Simpan</button>
    </form>
</div>
@endsection


