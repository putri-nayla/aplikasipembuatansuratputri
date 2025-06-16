<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Penerima;

class ControllerPenerima extends Controller
{
    public function index()
    {
        $surats = Penerima::all();
        return view('penerima.index', compact('surats'));
    }

    public function create()
    {
        return view('penerima.create');
    }

    public function store(Request $request)
    {
        // Validasi input
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            // 'judul' => 'required|string|max:255', // aktifkan jika kolom 'judul' sudah ada di tabel
            'tanggal_diterima' => 'required|date',
        ]);

        // Simpan ke database
        Penerima::create($validated);

        return redirect()->route('penerima.index')->with('success', 'Surat berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $penerima = Penerima::findOrFail($id);
        return view('penerima.edit', compact('penerima'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            // 'judul' => 'required|string|max:255', // aktifkan jika kolom 'judul' sudah ada di tabel
            'tanggal_diterima' => 'required|date',
        ]);

        $penerima = Penerima::findOrFail($id);
        $penerima->update($validated);

        return redirect()->route('penerima.index')->with('success', 'Surat berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $penerima = Penerima::findOrFail($id);
        $penerima->delete();

        return redirect()->route('penerima.index')->with('success', 'Surat berhasil dihapus.');
    }

    public function show($id)
    {
        $penerima = Penerima::findOrFail($id);
        return view('penerima.show', compact('penerima'));
    }
}
