@extends('layouts.admin')

@section('title', 'Detail Pesan Kontak')
@section('page-title', 'Detail Pesan Kontak')

@section('content')
    <div class="admin-page-header">
        <div>
            <h1 class="admin-page-title">Detail Pesan Kontak</h1>
            <p class="admin-page-subtitle">Pesan dari <strong>{{ $contactMessage->name }}</strong></p>
        </div>
        <div>
            <a href="{{ route('admin.contact.index') }}" class="admin-btn admin-btn-secondary">
                &larr; Kembali ke Daftar Pesan
            </a>
        </div>
    </div>

    <div style="display: grid; grid-template-columns: 1fr; gap: 24px;">
        <div class="admin-card" style="padding: 0; overflow: hidden;">
            <div style="background-color: #f8faff; padding: 16px 24px; border-bottom: 1px solid #e5eaf2; display: flex; justify-content: space-between; align-items: center;">
                <h3 style="margin: 0; font-size: 1rem; color: #0a1628;">Informasi Pengirim</h3>
                
                @if($contactMessage->is_read)
                    <span class="admin-badge admin-badge-green">Sudah Dibaca</span>
                @else
                    <span class="admin-badge admin-badge-red">Belum Dibaca</span>
                @endif
            </div>

            <div style="padding: 24px;">
                <table style="width: 100%; border-collapse: collapse;">
                    <tr>
                        <td style="width: 200px; padding: 12px 0; color: #64748b; font-weight: 600;">Nama</td>
                        <td style="padding: 12px 0; color: #334155;"><strong>{{ $contactMessage->name }}</strong></td>
                    </tr>
                    <tr style="border-top: 1px solid #f1f5f9;">
                        <td style="width: 200px; padding: 12px 0; color: #64748b; font-weight: 600;">Email</td>
                        <td style="padding: 12px 0;">
                            <a href="mailto:{{ $contactMessage->email }}" style="color: #003d6a; text-decoration: none; font-weight: 600;">{{ $contactMessage->email }}</a>
                        </td>
                    </tr>
                    <tr style="border-top: 1px solid #f1f5f9;">
                        <td style="width: 200px; padding: 12px 0; color: #64748b; font-weight: 600;">Telepon</td>
                        <td style="padding: 12px 0; color: #334155;">
                            @if($contactMessage->phone)
                                <a href="tel:{{ $contactMessage->phone }}" style="color: #003d6a; text-decoration: none; font-weight: 600;">{{ $contactMessage->phone }}</a>
                            @else
                                -
                            @endif
                        </td>
                    </tr>
                    <tr style="border-top: 1px solid #f1f5f9;">
                        <td style="width: 200px; padding: 12px 0; color: #64748b; font-weight: 600;">Subjek</td>
                        <td style="padding: 12px 0; color: #334155;">{{ $contactMessage->subject ?: '(Tanpa Subjek)' }}</td>
                    </tr>
                    <tr style="border-top: 1px solid #f1f5f9;">
                        <td style="width: 200px; padding: 12px 0; color: #64748b; font-weight: 600;">Tanggal Masuk</td>
                        <td style="padding: 12px 0; color: #334155;">{{ $contactMessage->created_at ? $contactMessage->created_at->format('d M Y H:i') : '-' }}</td>
                    </tr>
                    <tr style="border-top: 1px solid #f1f5f9;">
                        <td style="width: 200px; padding: 12px 0; color: #64748b; font-weight: 600;">Dibaca Pada</td>
                        <td style="padding: 12px 0; color: #334155;">{{ $contactMessage->read_at ? $contactMessage->read_at->format('d M Y H:i') : '-' }}</td>
                    </tr>
                </table>
            </div>
        </div>

        <div class="admin-card" style="padding: 0; overflow: hidden;">
            <div style="background-color: #f8faff; padding: 16px 24px; border-bottom: 1px solid #e5eaf2;">
                <h3 style="margin: 0; font-size: 1rem; color: #0a1628;">Isi Pesan</h3>
            </div>

            <div style="padding: 24px;">
                <div style="background-color: #f1f5f9; border-left: 4px solid #003d6a; padding: 20px; border-radius: 6px; white-space: pre-line; color: #334155; line-height: 1.6;">
                    {{ $contactMessage->message }}
                </div>
            </div>
        </div>

        <div style="display: flex; justify-content: space-between; align-items: center; gap: 10px; flex-wrap: wrap; margin-bottom: 40px;">
            <div style="display: flex; gap: 8px; flex-wrap: wrap;">
                <a href="mailto:{{ $contactMessage->email }}?subject=Re: {{ rawurlencode($contactMessage->subject ?: 'Pesan Kontak') }}" class="admin-btn admin-btn-primary">
                    <svg width="16" height="16" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75" />
                    </svg>
                    Balas Email
                </a>

                @if($contactMessage->phone)
                    <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $contactMessage->phone) }}" target="_blank" rel="noopener" class="admin-btn admin-btn-success">
                        <svg width="16" height="16" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12.031 6.172c-3.181 0-5.767 2.586-5.768 5.766-.001 1.298.38 2.27 1.019 3.287l-.582 2.128 2.182-.573c.978.58 1.911.928 3.145.929 3.178 0 5.767-2.587 5.768-5.766.001-3.187-2.575-5.77-5.764-5.771zm3.392 8.244c-.144.405-.837.774-1.17.824-.299.045-.677.063-1.092-.069-.252-.08-.575-.187-.988-.365-1.739-.751-2.874-2.502-2.961-2.617-.087-.116-.708-.94-.708-1.793s.448-1.273.607-1.446c.159-.173.346-.217.462-.217l.332.006c.106.005.249-.04.39.298.144.347.491 1.2.534 1.287.043.087.072.188.014.304-.058.116-.087.188-.173.289l-.26.304c-.087.086-.177.18-.076.354.101.174.449.741.964 1.201.662.591 1.221.774 1.394.86s.274.072.376-.043c.101-.116.433-.506.549-.68.116-.173.231-.145.39-.087s1.011.477 1.184.564.289.13.332.202c.045.072.045.419-.1.824zm-3.423-14.416c-6.627 0-12 5.373-12 12s5.373 12 12 12 12-5.373 12-12-5.373-12-12-12zm.082 21.144c-1.467 0-2.899-.39-4.148-1.127l-4.57 1.2 1.22-4.457c-.815-1.286-1.246-2.775-1.246-4.316 0-4.664 3.795-8.459 8.461-8.459 4.665 0 8.46 3.795 8.46 8.46 0 4.664-3.795 8.459-8.46 8.459z"/>
                        </svg>
                        Hubungi WhatsApp
                    </a>
                @endif
            </div>

            <form action="{{ route('admin.contact.destroy', $contactMessage) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus pesan ini?');">
                @csrf
                @method('DELETE')
                <button type="submit" class="admin-btn admin-btn-danger">
                    Hapus Pesan
                </button>
            </form>
        </div>
    </div>
@endsection