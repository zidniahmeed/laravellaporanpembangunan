











<div class="mb-3">
    <label for="namakelurahan" class="form-label">Nama Kelurahan</label>
    <input type="text" name="namakelurahan" class="form-control"
        value="{{ old('namakelurahan', $kelurahan->namakelurahan ?? '') }}" required>
</div>

<div class="mb-3">
    <label for="provinsi" class="form-label">Provinsi</label>
    <select name="provinsi" id="provinsi" class="form-control" required>
        <option value="">Pilih Provinsi</option>
        @foreach ($provinces as $prov)
            <option value="{{ $prov['province'] }}" data-id="{{ $prov['province_id'] }}" {{ (old('provinsi', $kelurahan->provinsi ?? '') == $prov['province']) ? 'selected' : '' }}>
                {{ $prov['province'] }}
            </option>
        @endforeach
    </select>
</div>

<div class="mb-3">
    <label for="kabupaten" class="form-label">Kabupaten</label>
    <select name="kabupaten" id="kabupaten" class="form-control" required>
        @if(old('kabupaten', $kelurahan->kabupaten ?? ''))
            <option value="{{ old('kabupaten', $kelurahan->kabupaten ?? '') }}" selected>
                {{ old('kabupaten', $kelurahan->kabupaten ?? '') }}
            </option>
        @else
            <option value="">Pilih kabupaten...</option>
        @endif
    </select>
</div>

<div class="mb-3">
    <label for="kecamatan" class="form-label">Kecamatan</label>
    <input type="text" name="kecamatan" class="form-control" value="{{ old('kecamatan', $kelurahan->kecamatan ?? '') }}"
        required>
</div>

<div class="mb-3">
    <label for="alamatkelurahan" class="form-label">Alamat</label>
    <textarea name="alamatkelurahan"
        class="form-control">{{ old('alamatkelurahan', $kelurahan->alamatkelurahan ?? '') }}</textarea>
</div>

<div class="mb-3">
    <label for="nohpkelurahan" class="form-label">No HP</label>
    <input type="text" name="nohpkelurahan" class="form-control"
        value="{{ old('nohpkelurahan', $kelurahan->nohpkelurahan ?? '') }}">
</div>

<div class="mb-3">
    <label for="fotokelurahan" class="form-label">Foto</label>
    <input type="file" name="fotokelurahan" class="form-control">
    @if(isset($kelurahan) && $kelurahan->fotokelurahan)
        <img src="{{ asset( $kelurahan->fotokelurahan) }}" alt="Foto" class="img-thumbnail mt-2" width="150">
    @endif
</div>

<div class="row">
    <div class="col-md-6 mb-3">
        <label for="latitude" class="form-label">Latitude</label>
        <input type="text" id="latitude" name="latitude" class="form-control"
            value="{{ old('latitude', $kelurahan->latitude ?? '') }}" readonly>
    </div>
    <div class="col-md-6 mb-3">
        <label for="longitude" class="form-label">Longitude</label>
        <input type="text" id="longitude" name="longitude" class="form-control"
            value="{{ old('longitude', $kelurahan->longitude ?? '') }}" readonly>
    </div>
</div>


<script>
    document.addEventListener("DOMContentLoaded", function () {
        const provinsiSelect = document.getElementById("provinsi");
        const kabupatenSelect = document.getElementById("kabupaten");

        provinsiSelect.addEventListener("change", function () {
            const selectedOption = this.options[this.selectedIndex];
            const provId = selectedOption.getAttribute("data-id");

            fetch(`/api/kabupaten?province_id=${provId}`)
                .then(response => response.json())
                .then(data => {
                    kabupatenSelect.innerHTML = '<option value="">Pilih kabupaten...</option>';
                    data.forEach(city => {
                        kabupatenSelect.innerHTML += `<option value="${city.city_name}">${city.city_name}</option>`;
                    });
                });
        });
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(
                function (position) {
                    const lat = position.coords.latitude;
                    const lon = position.coords.longitude;
                    document.getElementById('latitude').value = lat;
                    document.getElementById('longitude').value = lon;
                },
                function (error) {
                    console.error("Gagal mengambil lokasi:", error.message);
                    switch (error.code) {
                        case error.PERMISSION_DENIED:
                            alert("Akses lokasi ditolak. Aktifkan izin lokasi di browser.");
                            break;
                        case error.POSITION_UNAVAILABLE:
                            alert("Informasi lokasi tidak tersedia.");
                            break;
                        case error.TIMEOUT:
                            alert("Permintaan lokasi melebihi waktu tunggu.");
                            break;
                        default:
                            alert("Terjadi kesalahan saat mengambil lokasi.");
                    }
                }
            );
        } else {
            alert("Browser tidak mendukung Geolocation.");
        }
    });
</script>



