<?php

namespace App\Http\Controllers;

use App\Models\ContactMessage;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Menampilkan halaman kontak.
     */
    public function index()
    {
        return view('contact');
    }

    /**
     * Menyimpan pesan kontak.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate(
        [
            'name'    => ['required', 'string', 'max:100'],
            'email'   => ['required', 'email', 'max:150'],
            'phone'   => ['nullable', 'string', 'max:20'],
            'subject' => ['required', 'string', 'max:200'],
            'message' => ['required', 'string', 'min:10', 'max:2000'],
        ],
        [
            'name.required' => 'Nama wajib diisi',
            'email.required' => 'Email wajib diisi',
            'subject.required' => 'Subjek wajib diisi',
            'message.required' => 'Pesan wajib diisi',
            'name.max' => 'Nama maksimal 100 karakter',
            'subject.max' => 'Subjek maksimal 200 karakter',
            'message.max' => 'Pesan maksimal 2000 karakter',
            'message.min' => 'Pesan minimal 10 karakter',
            'email.email' => 'Email tidak valid'
        ]
        );

        ContactMessage::create($validated);

        return redirect()
            ->route('contact')
            ->with('success', 'Pesan Anda telah berhasil dikirim. Kami akan segera menghubungi Anda.');
    }
}
