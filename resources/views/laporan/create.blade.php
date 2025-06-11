@extends('admin.templates.index')

@section('page-content')

        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between bg-danger">
                <h6 class="m-0 font-weight-bold text-white">Tambah laporan</h6>
            </div>
            <div class="card-body">
                <form action="{{ route('laporan.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    @include('laporan.form', ['mode' => 'create'])

                    <button type="submit" class="btn btn-success">Simpan</button>
                </form>
            </div>
        </div>
@endsection
