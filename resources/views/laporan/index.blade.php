@extends('admin.templates.index')

@section('page-content')

    <h2></h2>
    <a href="{{ route('laporan.create') }}" class="btn btn-primary mb-3">Tambah laporan</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <div class="row">
        <div class="col-md-12 mb-4">
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between bg-danger">
                    <h6 class="m-0 font-weight-bold text-white">Data laporan</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped" id="table">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Kelurahan</th>
                                    <th>Tahun</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($laporan as $item)
                                    <tr>
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        <td>{{ $item->kelurahan->namakelurahan }}</td>
                                        <td>{{ $item->tahun ?? null }}</td>
                                        <td>
                                            @if (session('admin')->level == 'Admin Kelurahan')
                                                @if ($item->status == 'Ditolak')
                                                    Silahkan Revisi Laporan Anda
                                                @else
                                                    {{ $item->status }}
                                                @endif
                                            @else
                                                {{ $item->status }}
                                            @endif

                                        </td>
                                        <td>
                                            <a href="{{ route('laporan.edit', $item->idlaporan) }}"
                                                class="btn btn-sm btn-warning">Edit</a>
                                             <a href="{{ route('laporan.show', $item->idlaporan) }}"
                                                class="btn btn-sm btn-warning">cetak</a>
                                            <form action="{{ route('laporan.destroy', $item->idlaporan) }}" method="POST"
                                                style="display:inline-block;">
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
