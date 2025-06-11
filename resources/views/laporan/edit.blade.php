@extends('admin.templates.index')

@section('page-content')
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between bg-danger">
            <h6 class="m-0 font-weight-bold text-white">Edit laporan</h6>
        </div>
        <div class="card-body">
            <form action="{{ route('laporan.update', $laporan->idlaporan) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                @if (session('admin')->level == 'Lurah')


                <div class="mb-3">
                    <label for="idkelurahan" class="form-label">Ubah Status</label>
                    <select name="status" id="status" class="form-control" required>
                        <option>Pilih Status</option>
                        <option value="Menuggu Konfirmasi Lurah">Menunggu Konfirmasi</option>
                        <option value="Ditolak">Ditolak</option>
                        <option value="Menunggu Konfirmasi Bappeda">Diterima</option>
                    </select>
                </div>
                @else
                  <div class="mb-3">
                    <label for="idkelurahan" class="form-label">Ubah Status</label>
                    <select name="status" id="status" class="form-control" required>
                        <option>Pilih Status</option>
                        <option value="Menunggu Konfirmasi Bappeda">Menunggu Konfirmasi </option>
                        <option value="Ditolak">Ditolak</option>
                        <option value="Diterima">Diterima</option>
                    </select>
                </div>
                @endif



                @include('laporan.form', ['mode' => 'edit'])

                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
@endsection
