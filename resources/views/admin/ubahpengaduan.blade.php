@extends('admin.templates.index')

@section('page-content')
<div class="row">
    <div class="col-md-12 mb-4">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between bg-coklat">
                <h6 class="m-0 font-weight-bold text-white">Ubah Pengaduan</h6>
            </div>
            <div class="card-body">
                <form method="post" action="{{ url('admin/updatepengaduan/' . $pengaduan->idpengaduan) }}"
                    enctype="multipart/form-data">
                    @csrf

                    <div class="form-group">
                        <label for="kategori">Jenis Kejahatan</label>
                        <select class="form-control select2" id="kategori" name="kategori" required>
                            <option value="" disabled>Pilih Jenis Kejahatan</option>
                            @foreach ($kategori as $value)
                            <option value="{{ $value->idkategori }}" {{ $value->idkategori == $pengaduan->idkategori ?
                                'selected' : '' }}>
                                {{ $value->kategori }}
                            </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="kecamatan">Kecamatan</label>
                        <select class="form-control select2" id="kecamatan" name="kecamatan" required>
                            <option value="" disabled>Pilih Kecamatan</option>
                            <option value="RESKRIM" {{ $pengaduan->kecamatan == 'RESKRIM' ? 'selected' : '' }}>RESKRIM
                            </option>
                            <option value="M. AREA" {{ $pengaduan->kecamatan == 'M. AREA' ? 'selected' : '' }}>M. AREA
                            </option>
                            <option value="M. KOTA" {{ $pengaduan->kecamatan == 'M. KOTA' ? 'selected' : '' }}>M. KOTA
                            </option>
                            <option value="M. TIMUR" {{ $pengaduan->kecamatan == 'M. TIMUR' ? 'selected' : '' }}>M.
                                TIMUR</option>
                            <option value="M. BARAT" {{ $pengaduan->kecamatan == 'M. BARAT' ? 'selected' : '' }}>M.
                                BARAT</option>
                            <option value="M. BARU" {{ $pengaduan->kecamatan == 'M. BARU' ? 'selected' : '' }}>M. BARU
                            </option>
                            <option value="PS. TUAN" {{ $pengaduan->kecamatan == 'PS. TUAN' ? 'selected' : '' }}>PS.
                                TUAN</option>
                            <option value="PATUMBAK" {{ $pengaduan->kecamatan == 'PATUMBAK' ? 'selected' : '' }}>
                                PATUMBAK</option>
                            <option value="DELITUA" {{ $pengaduan->kecamatan == 'DELITUA' ? 'selected' : '' }}>DELITUA
                            </option>
                            <option value="SUNGGAL" {{ $pengaduan->kecamatan == 'SUNGGAL' ? 'selected' : '' }}>SUNGGAL
                            </option>
                            <option value="HELVETIA" {{ $pengaduan->kecamatan == 'HELVETIA' ? 'selected' : '' }}>
                                HELVETIA</option>
                            <option value="PANCUR BATU" {{ $pengaduan->kecamatan == 'PANCUR BATU' ? 'selected' : '' }}>
                                PANCUR BATU</option>
                            <option value="KUTALIMBARU" {{ $pengaduan->kecamatan == 'KUTALIMBARU' ? 'selected' : '' }}>
                                KUTALIMBARU</option>
                            <option value="TUNTUNGAN" {{ $pengaduan->kecamatan == 'TUNTUNGAN' ? 'selected' : '' }}>
                                TUNTUNGAN</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <textarea class="form-control" id="alamat" name="alamat" rows="4"
                            required>{{ old('alamat', $pengaduan->alamat) }}</textarea>
                    </div>

                    <div class="row">
                        <div class="col-lg-6 mb-4">
                            <div class="form-group">
                                <label for="Latitude">Latitude Lokasi</label>
                                <input type="text" class="form-control" id="Latitude" name="latitude"
                                    value="{{ old('latitude', $pengaduan->latitude) }}" required>
                            </div>
                            <div class="form-group">
                                <label for="Longitude">Longitude Lokasi</label>
                                <input type="text" class="form-control" id="Longitude" name="longitude"
                                    value="{{ old('longitude', $pengaduan->longitude) }}" required>
                            </div>
                        </div>
                        <div class="col-lg-6 mb-4">
                            <div class="form-group">
                                <label for="map">Peta Lokasi Perkara</label>
                                <div id="map" style="width: 100%; height: 300px; border: 1px solid #ccc;"></div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="judul">Judul</label>
                        <input type="text" class="form-control" id="judul" name="judul"
                            value="{{ old('judul', $pengaduan->judul) }}" required>
                    </div>

                    <div class="form-group">
                        <label for="isilaporan">Isi Laporan</label>
                        <textarea class="form-control" id="isilaporan" name="isilaporan" rows="4"
                            required>{{ old('isilaporan', $pengaduan->isilaporan) }}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="tanggal_pengaduan">Tanggal Pengaduan</label>
                        <input type="date" class="form-control" id="tanggal_pengaduan" name="tanggal_pengaduan"
                            value="{{ old('tanggal_pengaduan', $pengaduan->tanggal_pengaduan) }}" required>
                    </div>

                    <div class="form-group">
                        <label for="file">File</label>
                        <input type="file" class="form-control" id="file" name="file">
                        @if ($pengaduan->file)
                        <br>
                        <p>File Saat Ini: <a href="{{ asset('uploads/foto_pengaduan/' . $pengaduan->file) }}"
                                target="_blank">{{ $pengaduan->file }}</a></p>
                        @endif
                    </div>

                    <button type="submit" class="btn btn-secondary">Simpan Perubahan</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script src="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.js"></script>
<link rel="stylesheet" href="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.css" />

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
            center: [{{ $pengaduan->latitude ?? 3.598071213646393 }}, {{ $pengaduan->longitude ?? 98.66672878108118 }}],
            zoom: 13,
            layers: [peta2],
        });

        // Base layers untuk toggle
       const baseLayers = {
            'Default': peta2,
            'Satelite': peta3,
            'Street': peta5,
        };

        // Tambahkan kontrol layer
        const layerControl = L.control.layers(baseLayers).addTo(map);

        // Tambahkan marker awal jika data lokasi tersedia
        let marker;
        const initialLat = {{ $pengaduan->latitude ?? 'null' }};
        const initialLng = {{ $pengaduan->longitude ?? 'null' }};
        if (initialLat && initialLng) {
            marker = L.marker([initialLat, initialLng]).addTo(map);
        }

        // Tambahkan fitur pencarian
        const geocoder = L.Control.geocoder({
            defaultMarkGeocode: false
        }).on('markgeocode', function(e) {
            const latlng = e.geocode.center;
            if (marker) {
                map.removeLayer(marker);
            }
            marker = L.marker(latlng).addTo(map).bindPopup(e.geocode.name).openPopup();
            map.setView(latlng, 15);
            document.getElementById('Latitude').value = latlng.lat;
            document.getElementById('Longitude').value = latlng.lng;
        }).addTo(map);

        // Fungsi untuk menangani klik di peta
        function onMapClick(e) {
            if (marker) {
                map.removeLayer(marker);
            }
            marker = L.marker(e.latlng).addTo(map);
            document.getElementById('Latitude').value = e.latlng.lat;
            document.getElementById('Longitude').value = e.latlng.lng;
        }

        // Tambahkan event listener klik di peta
        map.on('click', onMapClick);
</script>
@endsection