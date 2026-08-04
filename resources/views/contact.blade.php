@extends('layouts.app')

@section('title', 'Hubungi Kami')

@section('content')
    <h1>Hubungi Kami</h1>
    <p>Ada pertanyaan atau ketertarikan untuk bekerja sama? Hubungi kami melalui form di bawah ini.</p>

    <div style="display: flex; flex-wrap: wrap; gap: 40px; margin-top: 30px;">
        <!-- Contact Form -->
        <div style="flex: 2; min-width: 300px;">
            <h2>Kirim Pesan</h2>
            
            @if ($errors->any())
                <div style="background-color: #f8d7da; color: #721c24; padding: 15px; border-radius: 4px; border: 1px solid #f5c6cb; margin-bottom: 20px;">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('contact.store') }}" method="POST">
                @csrf
                <div style="margin-bottom: 15px;">
                    <label for="name" style="display: block; font-weight: bold; margin-bottom: 5px;">Nama Lengkap *</label>
                    <input type="text" id="name" name="name" value="{{ old('name') }}" style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;" required>
                </div>

                <div style="margin-bottom: 15px;">
                    <label for="email" style="display: block; font-weight: bold; margin-bottom: 5px;">Alamat Email *</label>
                    <input type="email" id="email" name="email" value="{{ old('email') }}" style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;" required>
                </div>

                <div style="margin-bottom: 15px;">
                    <label for="phone" style="display: block; font-weight: bold; margin-bottom: 5px;">Nomor Telepon / WA</label>
                    <input type="text" id="phone" name="phone" value="{{ old('phone') }}" style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;">
                </div>

                <div style="margin-bottom: 15px;">
                    <label for="subject" style="display: block; font-weight: bold; margin-bottom: 5px;">Subjek *</label>
                    <input type="text" id="subject" name="subject" value="{{ old('subject') }}" style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;">
                </div>

                <div style="margin-bottom: 20px;">
                    <label for="message" style="display: block; font-weight: bold; margin-bottom: 5px;">Isi Pesan *</label>
                    <textarea id="message" name="message" rows="5" style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;" required>{{ old('message') }}</textarea>
                </div>

                <button type="submit" style="background-color: #0066cc; color: white; border: none; padding: 10px 20px; border-radius: 4px; cursor: pointer; font-size: 1em; font-weight: bold;">
                    Kirim Pesan
                </button>
            </form>
        </div>

        <!-- Contact Info -->
        <div style="flex: 1; min-width: 250px; background-color: #f9f9f9; padding: 25px; border-radius: 8px; border: 1px solid #eee;">
            <h2>Informasi Kontak</h2>
            <p><strong>Alamat Kantor:</strong><br>Jl. Cianjur No.34, Kacapiring, Kec. Batununggal, Kota Bandung, Jawa Barat 40195</p>
            <p><strong>Telepon:</strong><br>022 - 7217451</p>
            <p><strong>Email:</strong><br>diciptabintar@bandung.go.id</p>
            <p><strong>Jam Operasional:</strong><br>Senin - Jumat: 08.00 - 15.00 WIB</p>
        </div>
    </div>
@endsection
