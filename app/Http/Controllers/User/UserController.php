<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\JenisRoti;
use App\Models\Produk;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('Index');
    }

    public function catalog()
    {
        $jenisRotis = JenisRoti::all();
        return view('Catalog', ['jenisRotis' => $jenisRotis]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    public function ourlocation()
    {
        return view('Location');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $produks = Produk::where('jenis_id', $id)->get();
        return view('catalogShow', ['produks' => $produks]);
    }

    public function cart()
    {
        // $produks = Produk::where('jenis_id', $id)->get();
        return view('cart');
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
