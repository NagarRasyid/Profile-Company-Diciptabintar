<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactMessage;
use Illuminate\Http\RedirectResponse;

class ContactMessageController extends Controller
{
    /**
     * Menampilkan daftar pesan masuk.
     */
    public function index()
    {
        $filter = request('filter', 'all');

        $messages = ContactMessage::when($filter === 'unread', fn($q) => $q->unread())
            ->when($filter === 'read', fn($q) => $q->read())
            ->latest()
            ->paginate(20);

        $unreadCount = ContactMessage::unread()->count();

        return view('admin.contact.index', compact('messages', 'unreadCount', 'filter'));
    }

    /**
     * Menampilkan pesan masuk.
     */
    public function show(ContactMessage $contactMessage)
    {
        if (! $contactMessage->is_read) {
            $contactMessage->markAsRead();
        }

        return view('admin.contact.show', compact('contactMessage'));
    }

    /**
     * Menandai pesan sebagai sudah dibaca.
     */
    public function markAsRead(ContactMessage $contactMessage): RedirectResponse
    {
        $contactMessage->markAsRead();

        return redirect()
            ->route('admin.contact.index')
            ->with('success', 'Pesan telah ditandai sebagai sudah dibaca.');
    }

    /**
     * Menghapus pesan masuk.
     */
    public function destroy(ContactMessage $contactMessage): RedirectResponse
    {
        $contactMessage->delete();

        return redirect()
            ->route('admin.contact.index')
            ->with('success', 'Pesan berhasil dihapus.');
    }
}
