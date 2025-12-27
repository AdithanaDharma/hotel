<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;

class HotelController extends Controller
{
    public function index()
    {
        $hotel = DB::table('hotel')->orderBy('id', 'desc')->paginate(10);
        return view('admin.hotel.index', compact('hotel'));
    }

    public function create()
    {
        return view('admin.hotel.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_hotel' => 'required|string|max:255',
            'alamat' => 'required|string',
            'kota' => 'required|string|max:100',
            'deskripsi' => 'nullable|string',
            'fitur_hotel' => 'nullable|string',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $gambarPath = $request->file('gambar')->store('hotel_images', 'public');

        DB::table('hotel')->insert([
            'nama_hotel' => $request->nama_hotel,
            'alamat' => $request->alamat,
            'kota' => $request->kota,
            'description' => $request->deskripsi,
            'gambar' => $gambarPath,
            'fitur_hotel' => $request->fitur_hotel,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect()->route('admin.hotel.index')->with('message', 'Hotel berhasil ditambahkan');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_hotel' => 'required|string|max:255',
            'alamat' => 'required|string',
            'kota' => 'required|string|max:100',
            'deskripsi' => 'nullable|string',
            'fitur_hotel' => 'nullable|string',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $hotel = DB::table('hotel')->where('id', $id)->first();

        $data = [
            'nama_hotel' => $request->nama_hotel,
            'alamat' => $request->alamat,
            'kota' => $request->kota,
            'description' => $request->deskripsi,
            'fitur_hotel' => $request->fitur_hotel,
            'updated_at' => now(),
        ];

        if ($request->hasFile('gambar')) {
            // Hapus gambar lama jika ada
            if ($hotel->gambar) {
                Storage::disk('public')->delete($hotel->gambar);
            }

            // Upload gambar baru
            $data['gambar'] = $request->file('gambar')->store('hotel_images', 'public');
        }

        DB::table('hotel')->where('id', $id)->update($data);

        return redirect()->route('admin.hotel.index')->with('message', 'Hotel berhasil diperbarui');
    }

    public function edit(string $id)
    {
        $hotel = DB::table('hotel')->where('id', $id)->first();
        if (!$hotel) {
            return redirect()->route('admin.hotel.index')
                ->with('error', 'Data hotel tidak ditemukan');
        }

        return view('admin.hotel.create', compact('hotel'));
    }

    public function destroy(string $id)
    {
        $hotel = DB::table('hotel')->where('id', $id)->first();

        if (!$hotel) {
            return redirect()->route('admin.hotel.index')
                ->with('error', 'Data hotel tidak ditemukan');
        }

        DB::table('hotel')->where('id', $id)->delete();

        return redirect()->route('admin.hotel.index')
            ->with('message', 'Data hotel berhasil dihapus');
    }
}
