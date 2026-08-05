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
     * Menyimpan pesan/pengaduan kontak, termasuk upload lampiran.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate(
            [
                'name'       => ['required', 'string', 'max:100'],
                'email'      => ['required', 'email', 'max:150'],
                'phone'      => ['required', 'string', 'max:20'],
                'subject'    => ['required', 'string', 'max:200'],
                'message'    => ['required', 'string', 'min:10', 'max:2000'],
                'attachment' => ['nullable', 'file', 'mimes:png,jpg,jpeg,pdf', 'max:5120'],
            ],
            [
                'name.required'    => 'Nama wajib diisi',
                'email.required'   => 'Email wajib diisi',
                'email.email'      => 'Format email tidak valid',
                'phone.required'   => 'Nomor telepon wajib diisi',
                'subject.required' => 'Subjek wajib dipilih',
                'message.required' => 'Isi pesan wajib diisi',
                'message.min'      => 'Isi pesan minimal 10 karakter',
                'message.max'      => 'Isi pesan maksimal 2000 karakter',
                'attachment.mimes' => 'Lampiran hanya boleh berformat PNG, JPG, atau PDF',
                'attachment.max'   => 'Ukuran lampiran maksimal 5 MB',
            ]
        );

        // Simpan file lampiran jika ada
        if ($request->hasFile('attachment')) {
            $validated['attachment'] = $request->file('attachment')
                ->store('contact-attachments', 'public');
        }

        ContactMessage::create($validated);

        return redirect()
            ->route('contact')
            ->with('success', 'Pengaduan Anda telah berhasil dikirim. Kami akan segera menindaklanjutinya.');
    }
}
