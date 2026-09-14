<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class LayananPublikController extends Controller
{
    /** Daftar layanan publik. */
    public function index()
    {
        $services = Service::withTrashed()->ordered()->paginate(20);
        return view('admin.layanan.index', compact('services'));
    }

    /** Form tambah layanan. */
    public function create()
    {
        return view('admin.layanan.create');
    }

    /** Simpan layanan baru. */
    public function store(Request $request): RedirectResponse
    {
        $v = $request->validate([
            'title'              => ['required','string','max:200'],
            'description'        => ['required','string'],
            'color'              => ['required','in:blue,green,orange,pink,teal,gray'],
            'jumlah_permohonan'  => ['nullable','integer','min:0'],
            'icon'               => ['nullable','string'],
            'is_active'          => ['boolean'],
            'order'              => ['nullable','integer','min:0'],
        ]);
        $v['slug']      = Str::slug($v['title']);
        $v['is_active'] = $request->boolean('is_active', true);
        Service::create($v);
        return redirect()->route('admin.services.index')->with('success','Layanan berhasil ditambahkan.');
    }

    /** Form edit layanan. */
    public function edit(Service $service)
    {
        return view('admin.layanan.edit', compact('service'));
    }

    /** Perbarui layanan. */
    public function update(Request $request, Service $service): RedirectResponse
    {
        $v = $request->validate([
            'title'              => ['required','string','max:200'],
            'description'        => ['required','string'],
            'color'              => ['required','in:blue,green,orange,pink,teal,gray'],
            'jumlah_permohonan'  => ['nullable','integer','min:0'],
            'icon'               => ['nullable','string'],
            'is_active'          => ['boolean'],
            'order'              => ['nullable','integer','min:0'],
        ]);
        $v['slug']      = Str::slug($v['title']);
        $v['is_active'] = $request->boolean('is_active');
        $service->update($v);
        return redirect()->route('admin.services.index')->with('success','Layanan berhasil diperbarui.');
    }

    /** Hapus (soft delete) layanan. */
    public function destroy(Service $service): RedirectResponse
    {
        $service->delete();
        return redirect()->route('admin.services.index')->with('success','Layanan berhasil dihapus.');
    }

    /** Pulihkan layanan yang dihapus. */
    public function restore(int $id): RedirectResponse
    {
        Service::withTrashed()->findOrFail($id)->restore();
        return redirect()->route('admin.services.index')->with('success','Layanan berhasil dipulihkan.');
    }
}