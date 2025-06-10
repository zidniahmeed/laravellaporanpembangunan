@extends('admin.templates.index')

@section('page-content')
    <div class="row">
        <div class="col-md-12 mb-4">
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between bg-coklat">
                    <h6 class="m-0 font-weight-bold text-white">Tambah Pengaduan</h6>
                </div>
                <div class="card-body">
                    <form method="post" action="{{ url('admin/simpanpengaduan') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <label for="kategori">Jenis Kejahatan</label>
                            <select class="form-control select2" id="kategori" name="kategori" required>
                                <option value="" disabled selected>Pilih Jenis Kejahatan</option>
                                @foreach ($kategori as $value)
                                    <option value="{{ $value->idkategori }}">{{ $value->kategori }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="kecamatan">Kecamatan</label>
                            <select class="form-control select2" id="kecamatan" name="kecamatan" required>
                                <option value="" disabled selected>Pilih Kecamatan</option>
                                <option value="RESKRIM">RESKRIM</option>
                                <option value="M. AREA">M. AREA</option>
                                <option value="M. KOTA">M. KOTA</option>
                                <option value="M. TIMUR">M. TIMUR</option>
                                <option value="M. BARAT">M. BARAT</option>
                                <option value="M. BARU">M. BARU</option>
                                <option value="PS. TUAN">PS. TUAN</option>
                                <option value="PATUMBAK">PATUMBAK</option>
                                <option value="DELITUA">DELITUA</option>
                                <option value="SUNGGAL">SUNGGAL</option>
                                <option value="HELVETIA">HELVETIA</option>
                                <option value="PANCUR BATU">PANCUR BATU</option>
                                <option value="KUTALIMBARU">KUTALIMBARU</option>
                                <option value="TUNTUNGAN">TUNTUNGAN</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="alamat">Alamat Lokasi Perkara</label>
                            <textarea class="form-control" id="alamat" name="alamat" rows="4" required></textarea>
                        </div>

                        <div class="row">
                            <div class="col-lg-6 mb-4">
                                <div class="form-group">
                                    <label for="Latitude">Latitude Lokasi</label>
                                    <input type="text" class="form-control" id="Latitude" name="latitude"
                                        placeholder="Latitude" required>
                                </div>
                                <div class="form-group">
                                    <label for="Longitude">Longitude Lokasi</label>
                                    <input type="text" class="form-control" id="Longitude" name="longitude"
                                        placeholder="Longitude" required>
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
                            <input type="text" class="form-control" id="judul" name="judul" required>
                        </div>


                        <div class="form-group">
                            <label for="isilaporan">Isi Laporan</label>
                            <textarea class="form-control" id="isilaporan" name="isilaporan" rows="4" required></textarea>
                        </div>

                        <div class="form-group">
                            <label for="tanggal_pengaduan">Tanggal Pengaduan</label>
                            <input type="date" class="form-control" id="tanggal_pengaduan" name="tanggal_pengaduan"
                                required>
                        </div>

                        <div class="form-group">
                            <label for="file">File</label>
                            <input type="file" class="form-control" id="file" name="file">
                        </div>

                        <button type="submit" class="btn btn-secondary">Simpan</button>
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
            center: [3.598071213646393, 98.66672878108118],
            zoom: 11,
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

        let marker;

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
