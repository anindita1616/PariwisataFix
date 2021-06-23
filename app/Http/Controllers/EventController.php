<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    /**
     * Menampilkan List Wisata
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $event = Event::all();
        return view('events.index', compact('event'));
    }

    /**
     * Form Tambah Wisata
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('events.create');
    }

    /**
     * Simpan Ke Database
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Event $event)
    {
        Event::create([
            'judul' => request('judul'),
            'lokasi' => request('lokasi'),
            'kategori' => request('kategori'),
            'deskripsi' => request('deskripsi'),
        ]);
        return redirect()->route('events.index');
    }

    /**
     * Lihat Detail Wisata
     *
     * @param  int  $wisata
     * @return \Illuminate\Http\Response
     */
    public function show(Event $event)
    {
        Event::find($event);
        return view('events.show', compact('event'));
    }

    /**
     * Form Edit
     *
     * @param  int  $wisata
     * @return \Illuminate\Http\Response
     */
    public function edit(Event $event)
    {
        return view('events.edit', compact('event'));
    }

    /**
     * Update Database
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $wisata
     * @return \Illuminate\Http\Response
     */
    public function update(Event $event)
    {
        request()->validate([
            'judul' => 'required',
            'lokasi' => 'required',
            'kategori' => 'required',
            'deskripsi' => 'required',
        ]);

        $event->update([
            'judul' => request('judul'),
            'lokasi' => request('lokasi'),
            'kategori' => request('kategori'),
            'deskripsi' => request('deskripsi'),
        ]);
        return redirect()->route('events.index');
    }

    /**
     * Hapus dari Database
     *
     * @param  int  $wisata
     * @return \Illuminate\Http\Response
     */
    public function destroy(Event $event)
    {
        $event->delete();
        return redirect()->route('events.index');
    }
}
