<?php

namespace App\Http\Controllers;

use App\Models\Wisata;

class WisataController extends Controller
{
    /**
     * Menampilkan List Wisata
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $wisata = Wisata::all();
        return view('wisatas.index', compact('wisata'));
    }

    /**
     * Form Tambah Wisata
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('wisatas.create');
    }

    /**
     * Simpan Ke Database
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Wisata $wisata)
    {
        Wisata::create([
            'nama' => request('nama'),
            'alamat' => request('alamat'),
            'link' => request('link'),
            'deskripsi' => request('deskripsi'),
        ]);
        return redirect()->route('wisatas.index');
    }

    /**
     * Lihat Detail Wisata
     *
     * @param  int  $wisata
     * @return \Illuminate\Http\Response
     */
    public function show(Wisata $wisata)
    {
        Wisata::find($wisata);
        return view('wisatas.show', compact('wisata'));
    }

    /**
     * Form Edit
     *
     * @param  int  $wisata
     * @return \Illuminate\Http\Response
     */
    public function edit(Wisata $wisata)
    {
        return view('wisatas.edit', compact('wisata'));
    }

    /**
     * Update Database
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $wisata
     * @return \Illuminate\Http\Response
     */
    public function update(Wisata $wisata)
    {
        request()->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'link' => 'required',
            'deskripsi' => 'required',
        ]);

        $wisata->update([
            'nama' => request('nama'),
            'alamat' => request('alamat'),
            'link' => request('link'),
            'deskripsi' => request('deskripsi'),
        ]);
        return redirect()->route('wisatas.index');
    }

    /**
     * Hapus dari Database
     *
     * @param  int  $wisata
     * @return \Illuminate\Http\Response
     */
    public function destroy(Wisata $wisata)
    {
        $wisata->delete();
        return redirect()->route('wisatas.index');
    }
}
