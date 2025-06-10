@extends('admin.templates.index')

@section('page-content')
<div class="row">
    <div class="col-md-12 mb-4">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between bg-danger">
                <h6 class="m-0 font-weight-bold text-white">Ubah Jenis Pengaduan</h6>
            </div>
            <div class="card-body">
                <form method="post" action="{{ url('admin/updatekategori/' . $kategori->idkategori) }}"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="kategori">Jenis Pengaduan</label>
                        <input type="text" class="form-control" id="kategori" name="kategori"
                            value="{{ $kategori->kategori }}" required>
                    </div>

                    <button type="submit" class="btn btn-danger">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection