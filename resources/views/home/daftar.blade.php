<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi - Pelaporan Kriminal Tindak Kejahatan Masyarakat</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="{{ asset('foto/logos.jpeg') }}">

    <!-- SweetAlert2 CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">

    <style>
        body {
            background-image: url('../../../foto/bg.jpg');
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: Arial, sans-serif;
            color: #333;
            margin: 0;
        }

        /* Registration card styling */
        .register-form {
            background: #fff;
            padding: 40px;
            border-radius: 12px;
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
            width: 100%;
            max-width: 600px;
        }

        .register-form img.logo {
            width: 100px;
            margin-bottom: 20px;
        }

        .register-form h2 {
            margin-bottom: 15px;
            font-weight: bold;
            color: #333;
        }

        .register-form p {
            color: #666;
            font-size: 0.9rem;
        }

        /* Input styling */
        .form-control {
            border-radius: 30px;
            padding: 10px 15px;
            border: 1px solid #ddd;
            transition: all 0.3s ease;
        }

        .form-control:focus {
            border-color: #f97300;
            box-shadow: 0 0 5px rgba(74, 144, 226, 0.5);
        }

        /* Button styling */
        .btn-register {
            background: linear-gradient(135deg, #f97300, #ecb788);
            color: #fff;
            border: none;
            border-radius: 30px;
            padding: 10px 20px;
            transition: background 0.3s ease;
        }

        .btn-register:hover {
            background: linear-gradient(135deg, #ecb788, #f97300);
        }

        /* Links styling */
        .login-link {
            margin-top: 15px;
            display: block;
            color: #ecb788;
            font-weight: 500;
        }

        .login-link:hover {
            color: #333;
            text-decoration: underline;
        }

        .error-message {
            color: #d9534f;
            font-size: 0.875em;
            text-align: left;
        }
    </style>
</head>

<body>
    <div class="register-form mt-5 mb-5">
        <center>
            <img src="{{ asset('foto/logos.jpeg') }}" alt="Logo" class="logo">
            <h2>Registrasi</h2>
            <p>Silahkan mengisi data Anda untuk membuat akun baru</p>
        </center>
        <form method="post" action="{{ url('home/dodaftar') }}">
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
            <button type="submit" class="btn btn-register btn-block mt-4">Daftar</button>
            <center>
                <a href="/home/login" class="login-link">Sudah punya akun? <span
                        style="color: #f97300;">Login</span></a>
                <a href="/" class="login-link text-dark">Balik ke Beranda</a>
            </center>
        </form>
    </div>

    <!-- SweetAlert2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        // SweetAlert for success/error messages
        @if (session('success'))
            Swal.fire({
                icon: 'success',
                title: 'Berhasil!',
                text: '{{ session('success') }}',
                confirmButtonColor: '#f97300'
            });
        @endif
        @if (session('error'))
            Swal.fire({
                icon: 'error',
                title: 'Error!',
                text: '{{ session('error') }}',
                confirmButtonColor: '#f97300'
            });
        @endif
    </script>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>