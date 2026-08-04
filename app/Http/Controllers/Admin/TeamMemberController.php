<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TeamMember;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class TeamMemberController extends Controller
{
    /**
     * Menampilkan daftar anggota tim.
     */
    public function index()
    {
        $members = TeamMember::withTrashed()->ordered()->paginate(15);

        return view('admin.team.index', compact('members'));
    }

    /**
     * Menampilkan halaman tambah anggota tim.
     */
    public function create()
    {
        return view('admin.team.create');
    }

    /**
     * Menyimpan anggota tim baru.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name'          => ['required', 'string', 'max:150'],
            'position'      => ['required', 'string', 'max:150'],
            'bio'           => ['nullable', 'string', 'max:1000'],
            'photo'         => ['nullable', 'image', 'max:2048'],
            'order'         => ['integer', 'min:0'],
            'is_active'     => ['boolean'],
        ]);

        if ($request->hasFile('photo')) {
            $validated['photo'] = $request->file('photo')->store('team', 'public');
        }

        TeamMember::create($validated);

        return redirect()
            ->route('admin.team.index')
            ->with('success', 'Anggota tim berhasil ditambahkan.');
    }

    /**
     * Menampilkan halaman edit anggota tim.
     */
    public function edit(TeamMember $teamMember)
    {
        return view('admin.team.edit', compact('teamMember'));
    }

    /**
     * Mengupdate anggota tim.
     */
    public function update(Request $request, TeamMember $teamMember): RedirectResponse
    {
        $validated = $request->validate([
            'name'          => ['required', 'string', 'max:150'],
            'position'      => ['required', 'string', 'max:150'],
            'bio'           => ['nullable', 'string', 'max:1000'],
            'photo'         => ['nullable', 'image', 'max:2048'],
            'order'         => ['integer', 'min:0'],
            'is_active'     => ['boolean'],
        ]);

        if ($request->hasFile('photo')) {
            $validated['photo'] = $request->file('photo')->store('team', 'public');
        }

        $teamMember->update($validated);

        return redirect()
            ->route('admin.team.index')
            ->with('success', 'Anggota tim berhasil diperbarui.');
    }

    /**
     * Menghapus anggota tim.
     */
    public function destroy(TeamMember $teamMember): RedirectResponse
    {
        $teamMember->delete();

        return redirect()
            ->route('admin.team.index')
            ->with('success', 'Anggota tim berhasil dihapus.');
    }

    /**
     * Mengembalikan anggota tim yang dihapus.
     */
    public function restore(int $id): RedirectResponse
    {
        TeamMember::withTrashed()->findOrFail($id)->restore();

        return redirect()
            ->route('admin.team.index')
            ->with('success', 'Anggota tim berhasil dipulihkan.');
    }
}
