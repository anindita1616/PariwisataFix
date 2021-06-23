<?php

namespace App\Http\Controllers;

use App\Models\Kuliner;
use Illuminate\Http\Request;

class KulinerController extends Controller
{
    /**
     * Menampilkan List Wisata
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kuliner = Kuliner::all();
        return view('kuliners.index', compact('kuliner'));
    }

    /**
     * Form Tambah Wisata
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('kuliners.create');
    }

    /**
     * Simpan Ke Database
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Kuliner $kuliner)
    {
        Kuliner::create([
            'nama' => request('nama'),
            'alamat' => request('alamat'),
            'link' => request('link'),
            'deskripsi' => request('deskripsi'),
        ]);
        return redirect()->route('kuliners.index');
    }

    /**
     * Lihat Detail Wisata
     *
     * @param  int  $wisata
     * @return \Illuminate\Http\Response
     */
    public function show(Kuliner $kuliner)
    {
        Kuliner::find($kuliner);
        return view('kuliners.show', compact('kuliner'));
    }

    /**
     * Form Edit
     *
     * @param  int  $wisata
     * @return \Illuminate\Http\Response
     */
    public function edit(Kuliner $kuliner)
    {
        return view('kuliners.edit', compact('kuliner'));
    }

    /**
     * Update Database
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $wisata
     * @return \Illuminate\Http\Response
     */
    public function update(Kuliner $kuliner)
    {
        request()->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'link' => 'required',
            'deskripsi' => 'required',
        ]);

        $kuliner->update([
            'nama' => request('nama'),
            'alamat' => request('alamat'),
            'link' => request('link'),
            'deskripsi' => request('deskripsi'),
        ]);
        return redirect()->route('kuliners.index');
    }

    /**
     * Hapus dari Database
     *
     * @param  int  $wisata
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kuliner $kuliner)
    {
        $kuliner->delete();
        return redirect()->route('kuliners.index');
    }
}
