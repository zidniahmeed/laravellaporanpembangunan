@extends('admin.templates.index')

@section('page-content')
<div class="row">
    <div class="col-md-12 mb-4">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between bg-danger">
                <h6 class="m-0 font-weight-bold text-white">Detail Pengaduan</h6>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="table-responsive">
                        <table class="table table-bordered bg-light">
                            <tbody>
                                <tr>
                                    <th>Id Pengaduan</th>
                                    <td>{{ $pengaduan->idpengaduan }}</td>
                                </tr>
                                <tr>
                                    <th>Nama</th>
                                    <td>{{ $pengaduan->nama }}</td>
                                </tr>
                                <tr>
                                    <th>Judul</th>
                                    <td>{{ $pengaduan->judul }}</td>
                                </tr>
                                <tr>
                                    <th>Jenis Kejahatan</th>
                                    <td>{{ $pengaduan->kategori }}</td>
                                </tr>
                                <tr>
                                    <th>Alamat</th>
                                    <td>{{ $pengaduan->alamat }}</td>
                                </tr>
                                <tr>
                                    <th>Kecamatan</th>
                                    <td>{{ $pengaduan->kecamatan }}</td>
                                </tr>
                                <tr>
                                    <th>Isi Laporan</th>
                                    <td>{{ $pengaduan->isilaporan }}</td>
                                </tr>
                                <tr>
                                    <th>File</th>
                                    <td>
                                        @if ($pengaduan->file)
                                        <a href="{{ asset('uploads/foto_pengaduan/' . $pengaduan->file) }}"
                                            class="btn btn-primary" target="_blank">Lihat File</a>
                                        @else
                                        Tidak ada file yang diunggah
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th>Tanggal Pengaduan</th>
                                    <td>{{ \Carbon\Carbon::parse($pengaduan->tanggal_pengaduan)->format('d-m-Y') }}</td>
                                </tr>
                                <tr>
                                    <th>Status Pengaduan</th>
                                    <td>{{ $pengaduan->status_pengaduan }}</td>
                                </tr>
                            </tbody>
                        </table>

                    </div>
                    <div class="col-md-12 mb-4">
                        <div class="p-3 border rounded bg-light">
                            <div id="map" style="height: 400px; margin-top: 20px;"></div>

                        </div>
                    </div>
                </div>

                <!-- Form Pembaruan Status dan Catatan -->
                <form method="post" action="{{ url('admin/updatestatuspengaduan/' . $pengaduan->idpengaduan) }}">
                    @csrf
                    <div class="form-group">
                        <label for="status">Status Pengaduan</label>
                        <select class="form-control" id="status" name="status" required>
                            <option value="" selected disabled>Pilih Status</option>
                            <option value="Sedang Di Proses" {{ $pengaduan->status_pengaduan == 'Sedang Di Proses' ?
                                'selected' : '' }}>Sedang Di
                                Proses</option>
                            <option value="Selesai" {{ $pengaduan->status_pengaduan == 'Selesai' ? 'selected' : '' }}>
                                Selesai</option>
                            <option value="Di Tolak" {{ $pengaduan->status_pengaduan == 'Di Tolak' ? 'selected' : '' }}>
                                Di Tolak</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="catatan">Catatan</label>
                        <textarea class="form-control" id="catatan" name="catatan"
                            rows="4">{{ $pengaduan->catatan }}</textarea>
                    </div>

                    <button type="submit" class="btn btn-danger">Perbarui</button>
                </form>

                <!-- Map -->
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    // Definisi layer peta
var peta2 = L.tileLayer('https://mt1.google.com/vt/lyrs=m&x={x}&y={y}&z={z}', {
    attribution: '© Google Maps',
    maxZoom: 20,
});

var peta3 = L.tileLayer('https://{s}.google.com/vt/lyrs=s&x={x}&y={y}&z={z}', {
    maxZoom: 20,
    subdomains: ['mt0', 'mt1', 'mt2', 'mt3']
});

var peta5 = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
});

// Inisialisasi peta
const map = L.map('map', {
    center: [{{ $pengaduan->latitude }}, {{ $pengaduan->longitude }}], // center map based on the complaint's latitude and longitude
    zoom: 13,
    layers: [peta2], // initial layer is Google Maps
});

// Base layers untuk toggle
const baseLayers = {
    'Default': peta2, // Google Maps default
    'Satelite': peta3, // Google Maps Satellite view
    'Street': peta5, // OpenStreetMap street view
};

// Tambahkan kontrol layer
const layerControl = L.control.layers(baseLayers).addTo(map);

// Add a marker for the complaint location
L.marker([{{ $pengaduan->latitude }}, {{ $pengaduan->longitude }}])
    .addTo(map)
    .bindPopup('<b>{{ $pengaduan->alamat }}</b><br>{{ $pengaduan->kecamatan }}')
    .openPopup();

</script>
@endsection