@extends('admin.templates.index')

@section('page-content')

        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between bg-danger">
                <h6 class="m-0 font-weight-bold text-white">Tambah laporan</h6>
            </div>
            <div class="card-body">
                <form method="post" action="{{ url('admin/simpanpengguna') }}">
            @csrf
            <div class="form-group">
                <label for="nama">Nama Lengkap*</label>
                <input type="text" class="form-control" id="nama" name="nama" value="{{ old('nama') }}" required>
                @error('nama')
                <div class="error-message">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="telepon">Telepon*</label>
                <input type="text" class="form-control" id="telepon" name="telepon" value="{{ old('telepon') }}"
                    required>
                @error('telepon')
                <div class="error-message">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="alamat">Alamat*</label>
                <textarea class="form-control" id="alamat" name="alamat" required>{{ old('alamat') }}</textarea>
                @error('alamat')
                <div class="error-message">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="email">Email*</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required>
                @error('email')
                <div class="error-message">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="password">Password*</label>
                <input type="password" class="form-control" id="password" name="password" required>
                @error('password')
                <div class="error-message">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="password_confirmation">Konfirmasi Password*</label>
                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation"
                    required>
                @error('password_confirmation')
                <div class="error-message">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="role">Role*</label>
                <input name="level" readonly value="{{ $level }}" class="form-control">

                @error('role')
                <div class="error-message">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary btn-block mt-4">Daftar</button>
        </form>
            </div>
        </div>
@endsection




