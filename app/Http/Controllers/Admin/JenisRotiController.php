<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\JenisRoti;
use App\Models\Produk;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;

class JenisRotiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jenisKue = JenisRoti::all();
        return view('admin.dashboard', ['jenisKue' => $jenisKue]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'gambar' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
        ]);

        if ($request->hasFile('gambar')) {
            $path = $request->file('gambar')->store('gambar_kue', 'public');
            $validated['gambar'] = $path;
        }

        JenisRoti::create($validated);
        return redirect()->back()->with('success', 'Jenis Kue berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $jenisKue = JenisRoti::findOrFail($id);

        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'gambar' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
        ]);

        if ($request->hasFile('gambar')) {
            if ($jenisKue->gambar) {
                Storage::disk('public')->delete($jenisKue->gambar);
            }
            $path = $request->file('gambar')->store('gambar_kue', 'public');
            $validated['gambar'] = $path;
        }

        $jenisKue->update($validated);
        return redirect()->back()->with('success', 'Jenis Kue berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // dd($id);
        try {
            $jenisKue = JenisRoti::findOrFail($id);
            $produk = Produk::where('jenis_id', $id)->get();

            if ($produk) {
                return redirect()->back()->with('error', 'Data kategori produk tidak dapat dihapus karena terdapat pada produk.');
            }

            if ($jenisKue->gambar) {
                Storage::disk('public')->delete($jenisKue->gambar);
            }

            $jenisKue->delete();

            return redirect()->back()->with('success', 'Data jenis produk berhasil dihapus.');
        } catch (ModelNotFoundException $e) {
            return redirect()->back()->with('error', 'Data jenis produk tidak ditemukan.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan saat menghapus data.');
        }
    }
}
