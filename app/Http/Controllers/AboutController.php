<?php

namespace App\Http\Controllers;

use App\Models\TeamMember;

class AboutController extends Controller
{
    /**
     * Menampilkan halaman Profil.
     */
    public function index()
    {
        $team = TeamMember::active()->ordered()->get();

        return view('about', compact('team'));
    }
}
