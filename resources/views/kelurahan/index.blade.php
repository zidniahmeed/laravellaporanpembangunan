@extends('admin.templates.index')

@section('page-content')

    <h2></h2>
    <a href="{{ route('kelurahan.create') }}" class="btn btn-primary mb-3">Tambah Kelurahan</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <div class="row">
        <div class="col-md-12 mb-4">
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between bg-danger">
                    <h6 class="m-0 font-weight-bold text-white">Data Kelurahan</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped" id="table">
                                <thead>
                                    <tr>
                                        <th>Nama</th>
                                        <th>Kecamatan</th>
                                        <th>Kabupaten</th>
                                        <th>Provinsi</th>
                                        <th>No HP</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($kelurahan as $item)
                                        <tr>
                                            <td>{{ $item->namakelurahan }}</td>
                                            <td>{{ $item->kecamatan }}</td>
                                            <td>{{ $item->kabupaten }}</td>
                                            <td>{{ $item->provinsi }}</td>
                                            <td>{{ $item->nohpkelurahan }}</td>
                                            <td>
                                                <a href="{{ route('kelurahan.edit', $item->idkelurahan) }}"
                                                    class="btn btn-sm btn-warning">Edit</a>
                                                <form action="{{ route('kelurahan.destroy', $item->idkelurahan) }}"
                                                    method="POST" style="display:inline-block;">
                                                    @csrf @method('DELETE')
                                                    <button onclick="return confirm('Hapus data ini?')"
                                                        class="btn btn-sm btn-danger">Hapus</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
