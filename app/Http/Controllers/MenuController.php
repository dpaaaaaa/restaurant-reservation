<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MenuController extends Controller
{
    public function index()
    {
        $menus = Menu::all();
        return view('menu.index', compact('menus'));
    }

    public function create()
    {
        return view('menu.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_menu' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'harga' => 'required|numeric|min:0',
            'image' => 'nullable|file|mimes:jpg,jpeg,png|max:2048' // Validasi file gambar
        ],
        ['nama_menu.required' => 'Harus diisi'],
    );

        try {
            // Proses upload gambar jika ada
            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $validated['image'] = $file->storeAs('uploads/menus', time() . '_' . $file->getClientOriginalName(), 'public');
            }

            Menu::create($validated);
            return redirect()->route('menu.index')->with('success', 'Menu adeded succesfully.');
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'Terjadi kesalahan saat menyimpan menu: ' . $e->getMessage()]);
        }
    }

    public function edit($id)
    {
        $menu = Menu::findOrFail($id);
        return view('menu.edit', compact('menu'));
    }

    public function update(Request $request, $id)
    {
        $menu = Menu::findOrFail($id);

        $validated = $request->validate([
            'nama_menu' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'harga' => 'required|numeric|min:0',
            'image' => 'nullable|file|mimes:jpg,jpeg,png|max:2048' // Validasi file gambar
        ]);

        try {
            // Proses upload gambar jika ada
            if ($request->hasFile('image')) {
                // Hapus file lama jika ada
                if ($menu->image && Storage::exists('public/' . $menu->image)) {
                    Storage::delete('public/' . $menu->image);
                }

                $file = $request->file('image');
                $validated['image'] = $file->storeAs('uploads/menus', time() . '_' . $file->getClientOriginalName(), 'public');
            }

            $menu->update($validated);
            return redirect()->route('menu.index')->with('success', 'Menu berhasil diperbarui.');
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'Terjadi kesalahan saat memperbarui menu: ' . $e->getMessage()]);
        }
    }

    public function destroy($id)
    {
        $menu = Menu::findOrFail($id);

        try {
            // Hapus file gambar jika ada
            if ($menu->image && Storage::exists('public/' . $menu->image)) {
                Storage::delete('public/' . $menu->image);
            }

            $menu->delete();
            return redirect()->route('menu.index')->with('success', 'Menu berhasil dihapus.');
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'Terjadi kesalahan saat menghapus menu: ' . $e->getMessage()]);
        }
    }
}
