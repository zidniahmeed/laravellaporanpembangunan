<?php
namespace App\Http\Controllers;

use App\Models\Kelurahan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class KelurahanController extends Controller
{
    private $apiKey = '7d0b4eeaf6bcd262bc67cd532a17055d'; // ganti dengan API key-mu

    public function index()
    {
        $kelurahan = Kelurahan::all();
        return view('kelurahan.index', compact('kelurahan'));
    }

    public function create()
    {
        $provinces = $this->getProvinces();
        return view('kelurahan.create', compact('provinces'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'namakelurahan' => 'required',
            'kecamatan' => 'required',
            'kabupaten' => 'required',
            'provinsi' => 'required',
            'alamatkelurahan' => 'nullable',
            'nohpkelurahan' => 'nullable',
            'fotokelurahan' => 'nullable|file|image',
            'latitude' => 'nullable',
            'longitude' => 'nullable',
        ]);

        if ($request->hasFile('fotokelurahan')) {
            $file = $request->file('fotokelurahan');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('foto_kelurahan'), $filename);
            $data['fotokelurahan'] = 'foto_kelurahan/' . $filename;
        }



        Kelurahan::create($data);
        return redirect()->route('kelurahan.index')->with('success', 'Data berhasil ditambahkan');
    }

    public function edit(Kelurahan $kelurahan)
    {
        $provinces = $this->getProvinces();
        return view('kelurahan.edit', compact('kelurahan', 'provinces'));
    }

    public function update(Request $request, Kelurahan $kelurahan)
    {
        $data = $request->validate([
            'namakelurahan' => 'required',
            'kecamatan' => 'required',
            'kabupaten' => 'required',
            'provinsi' => 'required',
            'alamatkelurahan' => 'nullable',
            'nohpkelurahan' => 'nullable',
            'fotokelurahan' => 'nullable|file|image',
            'latitude' => 'nullable',
            'longitude' => 'nullable',
        ]);

        if ($request->hasFile('fotokelurahan')) {
            // Hapus foto lama jika ada
            if ($kelurahan->fotokelurahan && file_exists(public_path($kelurahan->fotokelurahan))) {
                unlink(public_path($kelurahan->fotokelurahan));
            }

            // Simpan foto baru
            $file = $request->file('fotokelurahan');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('foto_kelurahan'), $filename);
            $data['fotokelurahan'] = 'foto_kelurahan/' . $filename;
        }

        $kelurahan->update($data);
        return redirect()->route('kelurahan.index')->with('success', 'Data berhasil diupdate');
    }


    public function destroy(Kelurahan $kelurahan)
    {
        // Hapus foto jika ada
        if ($kelurahan->fotokelurahan && file_exists(public_path($kelurahan->fotokelurahan))) {
            unlink(public_path($kelurahan->fotokelurahan));
        }

        $kelurahan->delete();
        return redirect()->route('kelurahan.index')->with('success', 'Data berhasil dihapus');
    }


    // --- API RajaOngkir ---
    private function getProvinces()
    {
        $response = Http::withHeaders([
            'key' => $this->apiKey
        ])->get('https://api.rajaongkir.com/starter/province');

        return $response['rajaongkir']['results'] ?? [];
    }

    public function getCities(Request $request)
    {
        $provinceId = $request->input('province_id');
        $response = Http::withHeaders([
            'key' => $this->apiKey
        ])->get("https://api.rajaongkir.com/starter/city", [
                    'province' => $provinceId
                ]);

        return response()->json($response['rajaongkir']['results'] ?? []);
    }

    public function kelurahan(){
        $kelurahan = Kelurahan::get();
        return view('home.kelurahan',compact('kelurahan'));
    }
}

