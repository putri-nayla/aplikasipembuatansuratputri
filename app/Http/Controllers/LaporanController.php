<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Laporan;

class LaporanController extends Controller
{
    public function index(Request $request)
    {
        $query = Laporan::query();

        if ($request->filled('dari') && $request->filled('sampai')) {
            $query->whereBetween('tanggal_diterima', [$request->dari, $request->sampai]);
        }

        $laporans = $query->orderBy('tanggal_diterima', 'desc')->get();

        return view('laporan.index', compact('laporans'));
    }

    public function create()
    {
        return view('laporan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'isi' => 'required|string',
            'tanggal_diterima' => 'required|date',
        ]);

        Laporan::create($request->all());

        return redirect()->route('laporan.index')->with('success', 'Laporan berhasil ditambahkan.');
    }

    public function show($id)
    {
        $laporan = Laporan::findOrFail($id);
        return view('laporan.show', compact('laporan'));
    }

    public function edit($id)
    {
        $laporan = Laporan::findOrFail($id);
        return view('laporan.edit', compact('laporan'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'isi' => 'required|string',
            'tanggal_diterima' => 'required|date',
        ]);

        $laporan = Laporan::findOrFail($id);
        $laporan->update($request->all());

        return redirect()->route('laporan.index')->with('success', 'Laporan berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $laporan = Laporan::findOrFail($id);
        $laporan->delete();

        return redirect()->route('laporan.index')->with('success', 'Laporan berhasil dihapus.');
    }

    public function cetak(Request $request)
    {
        $query = Laporan::query();

        if ($request->filled('dari') && $request->filled('sampai')) {
            $dari = date('Y-m-d', strtotime($request->dari));
            $sampai = date('Y-m-d', strtotime($request->sampai));
            $query->whereBetween('tanggal_diterima', [$dari, $sampai]);
        }

        $data = $query->orderBy('tanggal_diterima', 'desc')->get();

        $pdf = \PDF::loadView('laporan.cetak', compact('data'));
        return $pdf->download('laporan-penerima.pdf');
    }
}
