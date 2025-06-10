@extends('admin.templates.index')

@section('page-content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    @if (session('admin')->level == 'User')
    <a href="{{ url('admin/tambahpengaduan') }}" class="btn btn-sm btn-secondary shadow-sm float-right pull-right">
        <i class="fas fa-plus fa-sm text-white-50"></i> Tambah Pengaduan
    </a>
    @endif
</div>
<div class="row">
    <div class="col-md-12 mb-4">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between bg-danger">
                <h6 class="m-0 font-weight-bold text-white">Data Pengaduan</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped" id="table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Judul</th>
                                <th>Jenis Kejahatan</th>
                                <th>Kecamatan</th>
                                <th>Alamat</th>
                                <th>Isi Laporan</th>
                                <th>File</th>
                                <th>Tanggal Pengaduan</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $nomor = 1; ?>
                            @foreach ($pengaduan as $p)
                            <tr>
                                <td>
                                    <?php echo $nomor; ?>
                                </td>
                                <td>{{ $p->nama }}</td>
                                <td>{{ $p->judul }}</td>
                                <td>{{ $p->kategori }}</td>
                                <td>{{ $p->kecamatan }}</td>
                                <td>{{ $p->alamat }}</td>
                                <td>{{ $p->isilaporan }}</td>
                                <td>
                                    @if ($p->file != null)
                                    <a href="{{ url('uploads/foto_pengaduan/' . $p->file) }}" class="btn btn-info"
                                        target="_blank">Download</a>
                                    @else
                                    <span class="text-danger">Tidak ada file</span>
                                    @endif
                                </td>
                                <td>{{ $p->tanggal_pengaduan }}</td>
                                <td class="text-center">
                                    <button class="btn btn-info"
                                        onclick="showCatatan('{{ $p->catatan ?? 'Tidak ada catatan.' }}')">
                                        {{ $p->status_pengaduan }}
                                    </button>
                                </td>
                                <td>
                                    @if (session('admin')->level == 'User')
                                    <a href="{{ url('admin/ubahpengaduan/' . $p->idpengaduan) }}"
                                        class="btn btn-primary m-1">Ubah</a>
                                    @endif
                                    @if (session('admin')->level == 'Admin')
                                    <a href="{{ url('admin/detailpengaduan/' . $p->idpengaduan) }}"
                                        class="btn btn-info m-1"">Detail</a>
                                            @endif
                                            <a href=" {{ url('admin/hapuspengaduan/' . $p->idpengaduan) }}"
                                        class="btn btn-danger m-1""
                                        onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Data ?')">Hapus</a>
                                </td>
                            </tr>
                            <?php $nomor++; ?>
                            @endforeach
                        </tbody>
                    </table>
                </div> <!-- End of responsive table div -->
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    function showCatatan(catatan) {
            // Show SweetAlert with notes or a message if none
            swal.fire({
                title: "Catatan Pengaduan",
                text: catatan,
                icon: "info",
                button: "Tutup",
            });
        }
</script>
@endsection