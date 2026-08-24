<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Diciptabintar') - Company Profile</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Baumans&family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    @stack('styles')
</head>
<body class="{{ request()->routeIs('admin.*') ? 'admin-body' : 'public-body' }}">

    @if(request()->routeIs('admin.*'))
        <div class="admin-shell">
            <aside class="admin-sidebar">
                <a href="{{ route('admin.dashboard') }}" class="admin-brand">
                    <span class="admin-brand-mark">DC</span>
                    <span>
                        <strong>Diciptabintar</strong>
                        <small>Admin Panel</small>
                    </span>
                </a>

                <nav class="admin-nav">
                    <a href="{{ route('admin.dashboard') }}"
                       class="admin-nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                        <span>🏠</span>
                        Dashboard
                    </a>

                    <a href="{{ route('admin.services.index') }}"
                       class="admin-nav-link {{ request()->routeIs('admin.services.*') ? 'active' : '' }}">
                        <span>🛠️</span>
                        Layanan
                    </a><a href="{{ route('admin.team.index') }}"
                       class="admin-nav-link {{ request()->routeIs('admin.team.*') ? 'active' : '' }}">
                        <span>👥</span>
                        Tim
                    </a>

                    <a href="{{ route('admin.news.index') }}"
                       class="admin-nav-link {{ request()->routeIs('admin.news.*') ? 'active' : '' }}">
                        <span>📰</span>
                        Berita
                    </a>

                    <a href="{{ route('admin.contact.index') }}"
                       class="admin-nav-link {{ request()->routeIs('admin.contact.*') ? 'active' : '' }}">
                        <span>✉️</span>
                        Pesan Kontak
                    </a>
                </nav>

                <div class="admin-sidebar-footer">
                    <a href="{{ route('home') }}" target="_blank" rel="noopener" class="admin-nav-link">
                        <span>🌐</span>
                        Lihat Website
                    </a>

                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="admin-logout">
                            <span>🚪</span>
                            Logout
                        </button>
                    </form>
                </div>
            </aside>

            <div class="admin-main">
                <header class="admin-topbar">
                    <div>
                        <p class="admin-eyebrow">Dashboard Admin</p>
                        <h2>@yield('title', 'Admin Panel')</h2>
                    </div>

                    <div class="admin-user">
                        <span class="admin-user-avatar">
                            {{ strtoupper(substr(Auth::user()->name ?? 'A', 0, 1)) }}
                        </span>
                        <span>
                            <strong>{{ Auth::user()->name ?? 'Admin' }}</strong>
                            <small>Administrator</small>
                        </span>
                    </div>
                </header>

                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                @if(session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif

                <main class="admin-content">
                    @yield('content')
                </main>
            </div>
        </div>
    @else
        <div class="site-shell">
            <header class="site-header">

                {{-- BRAND / LOGO --}}
                <a href="{{ route('home') }}" class="site-brand">
                    <div class="site-brand-mark">
                        <img src="{{ asset('images/logo.png') }}" alt="Logo">
                    </div>
                    <span>
                        <strong>DICIPTABINTAR</strong>
                        <small>Dinas Cipta Karya, Bina Konstruksi<br>dan Tata Ruang Kota Bandung</small>
                    </span>
                </a>

                {{-- NAVIGATION LINKS (CENTER) --}}
                <nav class="site-nav">
                    <a href="{{ route('home') }}" class="site-nav-link {{ request()->routeIs('home') ? 'active' : '' }}">
                        Beranda
                    </a>
                    <a href="{{ route('about') }}" class="site-nav-link {{ request()->routeIs('about') ? 'active' : '' }}">
                        Profil
                    </a>
                    <a href="{{ route('services.index') }}" class="site-nav-link {{ request()->routeIs('services.*') ? 'active' : '' }}">
                        Bidang
                    </a>
                    <a href="{{ route('layanan.index') }}" class="site-nav-link {{ request()->routeIs('layanan.*') ? 'active' : '' }}">
                        Layanan Publik
                    </a>
                    <a href="{{ route('regulasi.index') }}" class="site-nav-link {{ request()->routeIs('regulasi.*') ? 'active' : '' }}">
                        Regulasi
                    </a>
                    <a href="{{ route('news.index') }}" class="site-nav-link {{ request()->routeIs('news.*') ? 'active' : '' }}">
                        Berita
                    </a>
                </nav>

                {{-- RIGHT SIDE: Button --}}
                <div class="site-header-actions">
                    {{-- Hubungi Kami --}}
                    <a href="{{ route('contact') }}" class="site-btn-cta">
                        Hubungi Kami
                    </a>
                </div>

            </header>

            <!-- @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            @if(session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif -->

            <main class="site-main">
                @yield('content')
            </main>

            <footer class="site-footer">
                <div class="site-footer-inner">

                    {{-- Kolom 1: Brand + Deskripsi + Sosmed --}}
                    <div class="site-footer-brand">
                        <div class="site-footer-logo">
                            <div class="site-footer-logo-mark">
                                <img src="{{ asset('images/logo.png') }}" alt="Logo Diciptabintar">
                            </div>
                            <span class="site-footer-logo-name">DICIPTABINTAR</span>
                        </div>
                        <p class="site-footer-desc">
                            Dinas Cipta Karya, Bina Konstruksi dan Tata Ruang Pemerintah Kota Bandung.
                        </p>
                        <div class="site-footer-socials">
                            <a href="https://www.facebook.com/diciptabintar.bdg/" target="_blank" aria-label="Facebook" class="site-footer-social-btn">
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" viewBox="0 0 16 16">
                                    <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z"/>
                                </svg>
                            </a>
                            <a href="https://www.instagram.com/diciptabintar.bdg/" target="_blank" aria-label="Instagram" class="site-footer-social-btn">
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" viewBox="0 0 16 16">
                                    <path d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.9 3.9 0 0 0-1.417.923A3.9 3.9 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.9 3.9 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.9 3.9 0 0 0-.923-1.417A3.9 3.9 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0zm.003 1.44c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599s.453.546.598.92c.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.5 2.5 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.5 2.5 0 0 1-.92-.598 2.5 2.5 0 0 1-.6-.919c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233s.008-2.388.046-3.231c.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92s.546-.453.92-.598c.282-.11.705-.24 1.485-.276.843-.038 1.096-.046 3.232-.046zm0 2.452a4.108 4.108 0 1 0 0 8.216 4.108 4.108 0 0 0 0-8.216zm0 6.775a2.667 2.667 0 1 1 0-5.334 2.667 2.667 0 0 1 0 5.334zm5.23-6.937a.96.96 0 1 1-1.92 0 .96.96 0 0 1 1.92 0z"/>
                                </svg>
                            </a>
                            <a href="https://www.youtube.com/@diciptabintarkotabandung" target="_blank" aria-label="Youtube" class="site-footer-social-btn">
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" viewBox="0 0 16 16">
                                    <path d="M15.443 4.542a2.004 2.004 0 0 0-1.411-1.411C12.784 2.86 8 2.86 8 2.86s-4.784 0-6.032.331a2.004 2.004 0 0 0-1.411 1.411c-.331 1.248-.331 3.848-.331 3.848s0 2.6.331 3.848a2.004 2.004 0 0 0 1.411 1.412c1.248.33 6.032.33 6.032.33s4.784 0 6.032-.33a2.004 2.004 0 0 0 1.411-1.412c.332-1.248.332-3.848.332-3.848s0-2.6-.332-3.848zM6.4 10.375V6.375L10.4 8.375l-4.4 2z"/>
                                </svg>
                            </a>
                            <a href="https://www.tiktok.com/@bdg.diciptabintar" target="_blank" aria-label="Tiktok" class="site-footer-social-btn">
                                <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="currentColor" viewBox="0 0 15 14">
                                    <path d="M11.636 5.855c-.07.006-.143.01-.215.01-.818 0-1.538-.418-1.957-1.053 0 1.666 0 3.562 0 3.593 0 1.468-1.192 2.657-2.658 2.657C5.339 11.062 4.148 9.873 4.148 8.4c0-1.468 1.191-2.657 2.658-2.657.056 0 .11.005.164.008v1.31c-.054-.007-.107-.017-.164-.017-.75 0-1.357.608-1.357 1.356s.607 1.356 1.357 1.356c.75 0 1.411-.59 1.411-1.34 0-.03.013-6.103.013-6.103h1.252c.118 1.12.102 2.003 2.15 2.084v1.309z"/>
                                </svg>
                            </a>
                            <a href="https://x.com/ciptabintarbdg" target="_blank" aria-label="X (Twitter)" class="site-footer-social-btn">
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" viewBox="0 0 16 16">
                                    <path d="M12.6.75h2.454l-5.36 6.142L16 15.25h-4.937l-3.867-5.07-4.425 5.07H.316l5.733-6.57L0 .75h5.063l3.495 4.633L12.601.75Zm-.86 13.028h1.36L4.323 2.145H2.865l8.875 11.633Z"/>
                                </svg>
                            </a>
                        </div>
                    </div>

                    {{-- Kolom 2: Kontak Kami --}}
                    <div class="site-footer-col">
                        <h4 class="site-footer-heading">KONTAK KAMI</h4>
                        <ul class="site-footer-list site-footer-links">
                            <li>
                                <a href="https://maps.app.goo.gl/QMqyoeaeH9HU7Wkh6" target="_blank">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" viewBox="0 0 16 16"><path d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10zm0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6z"/></svg>
                                    Jl. Cianjur No.34, Kacapiring, Kota Bandung
                                </a>
                            </li>
                            <li>
                                <a href="https://mail.google.com/mail/?view=cm&fs=1&to=diciptabintar@bandung.go.id" target="_blank">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" viewBox="0 0 16 16"><path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1zm13 2.383-4.708 2.825L15 11.105zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741M1 11.105l4.708-2.897L1 5.383z"/></svg>
                                    diciptabintar@bandung.go.id
                                </a>
                            </li>
                            <li>
                                <a href="https://wa.me/6282240791234" target="_blank">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" viewBox="0 0 16 16"><path d="M13.601 2.326A7.85 7.85 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.9 7.9 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.9 7.9 0 0 0 13.6 2.326zM7.994 14.521a6.6 6.6 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.56 6.56 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592m3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.73.73 0 0 0-.529.247c-.182.198-.691.677-.691 1.654s.71 1.916.81 2.049c.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232"/></svg>
                                    +62 822-4079-1234
                                </a>
                            </li>
                            <li>
                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" viewBox="0 0 16 16"><path d="M3.654 1.328a.678.678 0 0 0-1.015-.063L1.605 2.3c-.483.484-.661 1.169-.45 1.77a17.6 17.6 0 0 0 4.168 6.608 17.6 17.6 0 0 0 6.608 4.168c.601.211 1.286.033 1.77-.45l1.034-1.034a.678.678 0 0 0-.063-1.015l-2.307-1.794a.68.68 0 0 0-.58-.122l-2.19.547a1.75 1.75 0 0 1-1.657-.459L5.482 8.062a1.75 1.75 0 0 1-.46-1.657l.548-2.19a.68.68 0 0 0-.122-.58z"/></svg>
                                (022) 7217451
                            </li>
                        </ul>
                    </div>

                    {{-- Kolom 3: Tautan Cepat --}}
                    <div class="site-footer-col">
                        <h4 class="site-footer-heading">TAUTAN CEPAT</h4>
                        <ul class="site-footer-list site-footer-links">
                            <li><a href="{{ route('about') }}">Profil Dinas</a></li>
                            <li><a href="{{ route('about') }}#struktur-organisasi">Struktur Organisasi</a></li>
                            <li><a href="http://172.31.30.3/sitarung/" target="_blank">Data Spasial</a></li>
                            <li><a href="{{ route('regulasi.index') }}">Portal Data</a></li>
                        </ul>
                    </div>

                    {{-- Kolom 4: Informasi Lainnya --}}
                    <div class="site-footer-col">
                        <h4 class="site-footer-heading">INFORMASI LAINNYA</h4>
                        <ul class="site-footer-list site-footer-links">
                            <li><a href="/kebijakan-privasi">Kebijakan Privasi</a></li>
                            <li><a href="/syarat-ketentuan">Syarat &amp; Ketentuan</a></li>
                            <li><a href="#">Peta Situs</a></li>
                            <li><a href="https://diciptabintar.bandung.go.id/layanan/faq" target="_blank">FAQ</a></li>
                        </ul>
                    </div>

                </div>

                {{-- Bottom bar --}}
                <div class="site-footer-bottom">
                    <p>&copy; {{ date('Y') }} Dinas Cipta Karya, Bina Konstruksi dan Tata Ruang Kota Bandung. All Rights Reserved.</p>
                </div>
            </footer>
        </div>
    @endif

    @stack('scripts')
</body>
</html>