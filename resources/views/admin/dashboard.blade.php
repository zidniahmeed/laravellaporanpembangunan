@extends('admin.templates.index')

@section('page-content')
    {{-- <div class="row">
        <!-- Statistics Cards -->
        <div class="col-md-12 col-12 mb-4">
            <div id="map" style="width: 100%; height: 300px; border: 1px solid #ccc;"></div>
        </div>

        <div class="col-md-6 col-12 mb-4">
            <div class="card shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Jumlah Pengaduan</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $jumlahPengaduan }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-exclamation-triangle fa-2x text-primary"></i> <!-- Updated icon -->
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6 col-12 mb-4">
            <div class="card shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Jumlah User</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $jumlahUser }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-user-friends fa-2x text-success"></i> <!-- Updated icon -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <!-- Pengaduan per Kecamatan -->
        <div class="col-md-6 mb-4">
            <div class="card shadow h-100 py-2">
                <div class="card-body">
                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                        Pengaduan per Kecamatan</div>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Kecamatan</th>
                                <th>Jumlah Pengaduan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pengaduanPerKecamatan as $pengaduan)
                                <tr>
                                    <td>{{ $pengaduan->kecamatan }}</td>
                                    <td>{{ $pengaduan->jumlah }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Pengaduan per Kategori -->
        <div class="col-md-6 mb-4">
            <div class="card shadow h-100 py-2">
                <div class="card-body">
                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                        Pengaduan per Kategori</div>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Kecamatan</th>
                                <th>Jumlah Pengaduan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pengaduanPerKategori as $kategori)
                                <tr>
                                    <td>{{ $kategori->kategori }}</td>
                                    <td>{{ $kategori->jumlah }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="row mb-3 mt-5">
        <div class="col-md-12">
            <p class="text-center">
                <a class="btn btn-primary" data-toggle="collapse" href="#multicollapseExample" role="button"
                    aria-expanded="false" aria-controls="multicollapseExample">Inisialisasi</a>
                @foreach ($centroids as $key => $value)
                    <a class="btn btn-primary" data-toggle="collapse" href="#multicollapseExample{{ $key }}"
                        role="button" aria-expanded="false" aria-controls="multicollapseExample{{ $key }}">Iterasi
                        ke {{ $key + 1 }}</a>
                @endforeach
            </p>
        </div>
    </div>

    <div class="collapse in show multi-collapse" id="multicollapseExample">
        <div class="mt-5">
            <h2>Inisialisasi</h2>
            <div class="row mb-5">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped" width="100%">
                            <thead>
                                <tr>
                                    <th rowspan="1">Centroid</th>
                                    <th rowspan="1">Jumlah Pengaduan</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($centroids as $key_c => $centroid)
                                    <tr>
                                        <td>{{ $key_c + 1 }}</td>
                                        <td>{{ $centroid['jumlah'] }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @foreach ($clusters as $key => $cluster)
        <div class="collapse multi-collapse" id="multicollapseExample{{ $key }}">
            <h2>Iterasi ke {{ $key + 1 }}</h2>
            <div class="row mb-5">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped" width="100%">
                            <thead>
                                <tr>
                                    <th class="text-center">No.</th>
                                    <th class="text-center">Kecamatan</th>
                                    <th class="text-center">Jumlah Pengaduan</th>
                                    <th class="text-center">Jarak ke Centroid</th>
                                    <th class="text-center">Cluster</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($cluster as $key_data => $value_data)
                                    <tr>
                                        <td class="text-center">{{ $key_data + 1 }}</td>
                                        <td class="text-center">{{ $value_data['kecamatan'] }}</td>
                                        <td class="text-center">{{ $value_data['jumlah'] }}</td>
                                        <td class="text-center">
                                            @foreach ($value_data['jarak_ke_centroid'] as $jarak)
                                                {{ $jarak }}<br>
                                            @endforeach
                                        </td>
                                        <td class="text-center">{{ $value_data['cluster'] }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    @endforeach --}}
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

        // Menambahkan marker untuk setiap data pengaduan
        @foreach ($datapengaduan as $item)
            L.marker([{{ $item->latitude }}, {{ $item->longitude }}])
                .addTo(map)
                .bindPopup('{{ $item->judul }}')
                .openPopup();
        @endforeach
    </script>
@endsection
