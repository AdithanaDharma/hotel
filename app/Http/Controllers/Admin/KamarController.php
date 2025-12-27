<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class KamarController extends Controller
{
    public function index()
    {
        $kamars = DB::table('kamar')
            ->join('hotel', 'kamar.id_hotel', '=', 'hotel.id')
            ->select('kamar.*', 'hotel.nama_hotel')
            ->get();
        return view('admin.kamar.index', compact('kamars'));
    }

    public function create()
    {
        $hotels = DB::table('hotel')->get();
        return view('admin.kamar.create', compact('hotels'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_hotel' => 'required|exists:hotel,id',
            'nama_kamar' => 'required|string|max:255',
            'description' => 'nullable|string',
            'fitur_kamar' => 'nullable|string',
            'harga' => 'required|string',
            'gambar_kamar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $harga = (int) str_replace('.', '', $request->harga);

        $data = [
            'id_hotel' => $request->id_hotel,
            'nama_kamar' => $request->nama_kamar,
            'description' => $request->description,
            'fitur_kamar' => $request->fitur_kamar,
            'harga' => $harga,
            'created_at' => now(),
            'updated_at' => now(),
        ];


        if ($request->hasFile('gambar_kamar')) {
            $path = $request->file('gambar_kamar')->store('public/kamar_images');
            $data['gambar_kamar'] = str_replace('public/', '', $path);
        }

        DB::table('kamar')->insert($data);

        return redirect()->route('admin.kamar.index')
            ->with('message', 'Kamar berhasil ditambahkan')
            ->with('message_type', 'success');
    }

    public function edit($id)
    {
        $kamar = DB::table('kamar')->where('id', $id)->first();
        $hotels = DB::table('hotel')->get();

        if (!$kamar) {
            abort(404);
        }

        return view('admin.kamar.create', compact('kamar', 'hotels'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'id_hotel' => 'required|exists:hotel,id',
            'nama_kamar' => 'required|string|max:255',
            'description' => 'nullable|string',
            'fitur_kamar' => 'nullable|string',
            'harga' => 'required|string',
            'gambar_kamar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $harga = (int) str_replace('.', '', $request->harga);
        $data = [
            'id_hotel' => $request->id_hotel,
            'nama_kamar' => $request->nama_kamar,
            'description' => $request->description,
            'fitur_kamar' => $request->fitur_kamar,
            'harga' => $harga,
            'updated_at' => now(),
        ];

        if ($request->hasFile('gambar_kamar')) {
            // Hapus gambar lama jika ada
            $kamar = DB::table('kamar')->where('id', $id)->first();
            if ($kamar->gambar_kamar) {
                Storage::delete('public/' . $kamar->gambar_kamar);
            }

            $path = $request->file('gambar_kamar')->store('public/kamar_images');
            $data['gambar_kamar'] = str_replace('public/', '', $path);
        }

        DB::table('kamar')->where('id', $id)->update($data);

        return redirect()->route('admin.kamar.index')
            ->with('message', 'Kamar berhasil diperbarui')
            ->with('message_type', 'success');
    }

    public function destroy($id)
    {
        $kamar = DB::table('kamar')->where('id', $id)->first();

        if ($kamar->gambar_kamar) {
            Storage::delete('public/' . $kamar->gambar_kamar);
        }

        DB::table('kamar')->where('id', $id)->delete();

        return redirect()->route('admin.kamar.index')
            ->with('message', 'Kamar berhasil dihapus')
            ->with('message_type', 'success');
    }
}
