<?php

namespace App\Http\Controllers;

use App\Models\Penginapan;
use Illuminate\Http\Request;

class PenginapanController extends Controller
{
    /**
     * Menampilkan List Wisata
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $penginapan = Penginapan::all();
        return view('penginapans.index', compact('penginapan'));
    }

    /**
     * Form Tambah Wisata
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('penginapans.create');
    }

    /**
     * Simpan Ke Database
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Penginapan $penginapan)
    {
        Penginapan::create([
            'nama' => request('nama'),
            'alamat' => request('alamat'),
            'link' => request('link'),
            'deskripsi' => request('deskripsi'),
        ]);
        return redirect()->route('penginapans.index');
    }

    /**
     * Lihat Detail Wisata
     *
     * @param  int  $wisata
     * @return \Illuminate\Http\Response
     */
    public function show(Penginapan $penginapan)
    {
        Penginapan::find($penginapan);
        return view('penginapans.show', compact('penginapan'));
    }

    /**
     * Form Edit
     *
     * @param  int  $wisata
     * @return \Illuminate\Http\Response
     */
    public function edit(Penginapan $penginapan)
    {
        return view('penginapans.edit', compact('penginapan'));
    }

    /**
     * Update Database
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $wisata
     * @return \Illuminate\Http\Response
     */
    public function update(Penginapan $penginapan)
    {
        request()->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'link' => 'required',
            'deskripsi' => 'required',
        ]);

        $penginapan->update([
            'nama' => request('nama'),
            'alamat' => request('alamat'),
            'link' => request('link'),
            'deskripsi' => request('deskripsi'),
        ]);
        return redirect()->route('penginapans.index');
    }

    /**
     * Hapus dari Database
     *
     * @param  int  $wisata
     * @return \Illuminate\Http\Response
     */
    public function destroy(Penginapan $penginapan)
    {
        $penginapan->delete();
        return redirect()->route('penginapans.index');
    }
}
