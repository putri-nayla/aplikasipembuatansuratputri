<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function index(): \Illuminate\View\View
    {
        $kategoris = Kategori::all(); // Ambil semua kategori
        return view('kategori.index', compact('kategoris'));
    }

    public function create(): \Illuminate\View\View
    {
        return view('kategori.create');
    }

    public function store(Request $request): \Illuminate\Http\RedirectResponse
    {
        $validated = $request->validate([
            'kategori' => 'required|string|max:255',
            'created_at' => 'nullable|date_format:Y-m-d\TH:i',
            'status' => 'required|in:pending,setujui,tolak',
        ]);

        Kategori::create($validated);

        return redirect()->route('kategori.index')->with('success', 'Kategori berhasil ditambahkan.');
    }

    public function show(Kategori $kategori): \Illuminate\View\View
    {
        return view('kategori.show', compact('kategori'));
    }

    public function edit(Kategori $kategori): \Illuminate\View\View
    {
        return view('kategori.edit', compact('kategori'));
    }

    public function update(Request $request, $id): \Illuminate\Http\RedirectResponse
    {
        $validated = $request->validate([
            'kategori' => 'required|string|max:255',
            'status' => 'required|in:pending,setujui,tolak',
        ]);

        $kategori = Kategori::findOrFail($id);
        $kategori->kategori = $validated['kategori'];
        $kategori->status = $validated['status'];
        $kategori->save();

        return redirect()->route('kategori.index')->with('success', 'Kategori berhasil diperbarui.');
    }

    public function destroy(Kategori $kategori): \Illuminate\Http\RedirectResponse
    {
        $kategori->delete();
        return redirect()->route('kategori.index')->with('success', 'Kategori berhasil dihapus.');
    }
}
