<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ServiceController extends Controller
{
    /**
     * Menampilkan daftar layanan.
     */
    public function index()
    {
        $services = Service::withTrashed()->ordered()->paginate(15);

        return view('admin.services.index', compact('services'));
    }

    /**
     * Menampilkan halaman tambah layanan.
     */
    public function create()
    {
        return view('admin.services.create');
    }

    /**
     * Menyimpan layanan baru.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'title'       => ['required', 'string', 'max:200'],
            'description' => ['required', 'string'],
            'icon'        => ['nullable', 'string', 'max:100'],
            'image'       => ['nullable', 'image', 'max:2048'],
            'is_active'   => ['boolean'],
            'order'       => ['integer', 'min:0'],
        ]);

        $validated['slug'] = Str::slug($validated['title']);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('services', 'public');
        }

        Service::create($validated);

        return redirect()
            ->route('admin.services.index')
            ->with('success', 'Layanan berhasil ditambahkan.');
    }

    /**
     * Menampilkan halaman edit layanan.
     */
    public function edit(Service $service)
    {
        return view('admin.services.edit', compact('service'));
    }

    /**
     * Mengupdate layanan.
     */
    public function update(Request $request, Service $service): RedirectResponse
    {
        $validated = $request->validate([
            'title'       => ['required', 'string', 'max:200'],
            'description' => ['required', 'string'],
            'icon'        => ['nullable', 'string', 'max:100'],
            'image'       => ['nullable', 'image', 'max:2048'],
            'is_active'   => ['boolean'],
            'order'       => ['integer', 'min:0'],
        ]);

        $validated['slug'] = Str::slug($validated['title']);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('services', 'public');
        }

        $service->update($validated);

        return redirect()
            ->route('admin.services.index')
            ->with('success', 'Layanan berhasil diperbarui.');
    }

    /**
     * Menghapus layanan.
     */
    public function destroy(Service $service): RedirectResponse
    {
        $service->delete();

        return redirect()
            ->route('admin.services.index')
            ->with('success', 'Layanan berhasil dihapus.');
    }

    /**
     * Mengembalikan layanan yang dihapus.
     */
    public function restore(int $id): RedirectResponse
    {
        Service::withTrashed()->findOrFail($id)->restore();

        return redirect()
            ->route('admin.services.index')
            ->with('success', 'Layanan berhasil dipulihkan.');
    }
}
