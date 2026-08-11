<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Admin') — Diciptabintar</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
    /* =============================================
       ADMIN LAYOUT STYLES
    ============================================= */
    * { box-sizing: border-box; }

    body.admin-body {
        margin: 0;
        padding: 0;
        font-family: 'Plus Jakarta Sans', 'Instrument Sans', sans-serif;
        background: #f1f5f9;
        color: #1e293b;
        display: flex;
        min-height: 100vh;
    }

    /* ---- SIDEBAR ---- */
    .admin-sidebar {
        width: 240px;
        flex-shrink: 0;
        background: #002147;
        min-height: 100vh;
        display: flex;
        flex-direction: column;
        position: fixed;
        top: 0;
        left: 0;
        bottom: 0;
        z-index: 100;
        transition: width 0.2s ease;
    }

    .admin-sidebar-logo {
        padding: 22px 20px 18px;
        border-bottom: 1px solid rgba(255,255,255,0.08);
        display: flex;
        align-items: center;
        gap: 10px;
        text-decoration: none;
    }

    .admin-sidebar-logo-icon {
        width: 34px;
        height: 34px;
        background: #003d6a;
        border-radius: 8px;
        display: grid;
        place-items: center;
        font-size: 1rem;
        flex-shrink: 0;
    }

    .admin-sidebar-logo-text {
        font-size: 0.85rem;
        font-weight: 700;
        color: #ffffff;
        line-height: 1.2;
    }

    .admin-sidebar-logo-sub {
        font-size: 0.67rem;
        color: rgba(255,255,255,0.45);
        font-weight: 400;
        display: block;
    }

    /* Nav groups */
    .admin-nav {
        flex: 1;
        padding: 16px 10px;
        overflow-y: auto;
    }

    .admin-nav-group-label {
        font-size: 0.62rem;
        font-weight: 700;
        text-transform: uppercase;
        color: rgba(255,255,255,0.3);
        padding: 8px 10px 4px;
        margin-top: 8px;
    }

    .admin-nav-link {
        display: flex;
        align-items: center;
        gap: 10px;
        padding: 9px 12px;
        border-radius: 8px;
        text-decoration: none;
        color: rgba(255,255,255,0.65);
        font-size: 0.86rem;
        font-weight: 500;
        transition: all 0.15s ease;
        margin-bottom: 2px;
    }

    .admin-nav-link:hover {
        background: rgba(255,255,255,0.08);
        color: #ffffff;
    }

    .admin-nav-link.active {
        background: #003d6a;
        color: #ffffff;
        font-weight: 600;
    }

    .admin-nav-link svg {
        width: 17px;
        height: 17px;
        flex-shrink: 0;
    }

    .admin-nav-badge {
        margin-left: auto;
        background: #dc2626;
        color: #ffffff;
        font-size: 0.65rem;
        font-weight: 700;
        padding: 1px 6px;
        border-radius: 999px;
        min-width: 18px;
        text-align: center;
    }

    /* Sidebar bottom */
    .admin-sidebar-footer {
        padding: 14px 10px;
        border-top: 1px solid rgba(255,255,255,0.08);
    }

    .admin-sidebar-user {
        display: flex;
        align-items: center;
        gap: 10px;
        padding: 8px 12px;
        border-radius: 8px;
        margin-bottom: 4px;
    }

    .admin-sidebar-user-avatar {
        width: 32px;
        height: 32px;
        border-radius: 50%;
        background: #003d6a;
        display: grid;
        place-items: center;
        font-size: 0.75rem;
        font-weight: 700;
        color: #ffffff;
        flex-shrink: 0;
    }

    .admin-sidebar-user-name {
        font-size: 0.82rem;
        font-weight: 600;
        color: rgba(255,255,255,0.85);
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    .admin-sidebar-user-role {
        font-size: 0.68rem;
        color: rgba(255,255,255,0.4);
        display: block;
    }

    .admin-logout-btn {
        display: flex;
        align-items: center;
        gap: 9px;
        width: 100%;
        padding: 8px 12px;
        border-radius: 8px;
        background: none;
        border: none;
        color: rgba(255,255,255,0.5);
        font-size: 0.83rem;
        cursor: pointer;
        text-decoration: none;
        transition: all 0.15s ease;
    }

    .admin-logout-btn:hover {
        background: rgba(220,38,38,0.15);
        color: #fca5a5;
    }

    /* ---- MAIN AREA ---- */
    .admin-main {
        margin-left: 240px;
        flex: 1;
        display: flex;
        flex-direction: column;
        min-height: 100vh;
    }

    /* Topbar */
    .admin-topbar {
        background: #ffffff;
        border-bottom: 1px solid #e5eaf2;
        padding: 0 28px;
        height: 58px;
        display: flex;
        align-items: center;
        justify-content: space-between;
        position: sticky;
        top: 0;
        z-index: 50;
    }

    .admin-topbar-title {
        font-size: 1rem;
        font-weight: 700;
        color: #0a1628;
        margin: 0;
    }

    .admin-topbar-right {
        display: flex;
        align-items: center;
        gap: 14px;
    }

    .admin-view-site-btn {
        display: inline-flex;
        align-items: center;
        gap: 5px;
        padding: 7px 14px;
        border: 1.5px solid #d1dbe8;
        border-radius: 8px;
        font-size: 0.81rem;
        font-weight: 600;
        color: #52565e;
        text-decoration: none;
        transition: all 0.15s ease;
    }

    .admin-view-site-btn:hover {
        border-color: #003d6a;
        color: #003d6a;
    }

    /* Content area */
    .admin-content {
        flex: 1;
        padding: 28px;
    }

    /* ---- ALERT HELPERS ---- */
    .admin-alert {
        padding: 12px 16px;
        border-radius: 8px;
        font-size: 0.87rem;
        margin-bottom: 20px;
        display: flex;
        align-items: flex-start;
        gap: 10px;
    }

    .admin-alert-success { background: #dcfce7; color: #15803d; border: 1px solid #bbf7d0; }
    .admin-alert-error   { background: #fee2e2; color: #991b1b; border: 1px solid #fecaca; }
    .admin-alert-warning { background: #fef3c7; color: #92400e; border: 1px solid #fde68a; }

    /* Stat cards */
    .admin-stat-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(170px, 1fr));
        gap: 16px;
        margin-bottom: 28px;
    }

    .admin-stat-card {
        background: #ffffff;
        border: 1px solid #e5eaf2;
        border-radius: 12px;
        padding: 18px 20px;
        border-top: 3px solid transparent;
        box-shadow: 0 1px 6px rgba(0,0,0,0.04);
    }

    .admin-stat-label {
        font-size: 0.73rem;
        font-weight: 600;
        text-transform: uppercase;
        color: #94a3b8;
        margin: 0 0 6px;
    }

    .admin-stat-number {
        font-size: 2rem;
        font-weight: 800;
        line-height: 1;
        margin: 0 0 8px;
        color: #0a1628;
    }

    .admin-stat-link {
        font-size: 0.78rem;
        font-weight: 600;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 3px;
    }

    /* Table */
    .admin-table-wrap { overflow-x: auto; }

    .admin-table {
        width: 100%;
        border-collapse: collapse;
        font-size: 0.875rem;
        min-width: 600px;
    }

    .admin-table th {
        background: #f8faff;
        color: #64748b;
        font-size: 0.72rem;
        font-weight: 700;
        text-transform: uppercase;
        padding: 11px 14px;
        border-bottom: 1.5px solid #e5eaf2;
        text-align: left;
        white-space: nowrap;
    }

    .admin-table td {
        padding: 12px 14px;
        border-bottom: 1px solid #f1f5f9;
        color: #334155;
        vertical-align: middle;
    }

    .admin-table tr:last-child td { border-bottom: none; }
    .admin-table tr:hover td { background: #f8faff; }

    .admin-table-card {
        background: #ffffff;
        border: 1px solid #e5eaf2;
        border-radius: 12px;
        overflow: hidden;
        box-shadow: 0 1px 6px rgba(0,0,0,0.04);
    }

    /* Badges */
    .admin-badge {
        display: inline-block;
        padding: 3px 9px;
        border-radius: 999px;
        font-size: 0.71rem;
        font-weight: 700;
    }

    .admin-badge-green  { background: #dcfce7; color: #15803d; }
    .admin-badge-gray   { background: #f1f5f9; color: #64748b; }
    .admin-badge-red    { background: #fee2e2; color: #991b1b; }
    .admin-badge-blue   { background: #dbeafe; color: #1d4ed8; }
    .admin-badge-orange { background: #ffedd5; color: #c2410c; }

    /* Buttons */
    .admin-btn {
        display: inline-flex;
        align-items: center;
        gap: 5px;
        padding: 7px 14px;
        border-radius: 7px;
        font-size: 0.82rem;
        font-weight: 600;
        text-decoration: none;
        border: 1.5px solid transparent;
        cursor: pointer;
        transition: all 0.15s ease;
        white-space: nowrap;
    }

    .admin-btn-primary   { background: #003d6a; color: #fff; border-color: #003d6a; }
    .admin-btn-primary:hover { background: #002a4d; }
    .admin-btn-secondary { background: transparent; color: #64748b; border-color: #d1dbe8; }
    .admin-btn-secondary:hover { border-color: #003d6a; color: #003d6a; }
    .admin-btn-danger    { background: transparent; color: #dc2626; border-color: #fecaca; }
    .admin-btn-danger:hover { background: #fee2e2; }
    .admin-btn-success   { background: #16a34a; color: #fff; border-color: #16a34a; }
    .admin-btn-success:hover { background: #15803d; }
    .admin-btn-sm { padding: 5px 10px; font-size: 0.77rem; }

    /* Page card wrapper */
    .admin-page-header {
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
        gap: 16px;
        margin-bottom: 24px;
        flex-wrap: wrap;
    }

    .admin-page-title {
        font-size: 1.3rem;
        font-weight: 800;
        color: #0a1628;
        margin: 0 0 4px;
    }

    .admin-page-subtitle {
        font-size: 0.85rem;
        color: #64748b;
        margin: 0;
    }

    .admin-card {
        background: #ffffff;
        border: 1px solid #e5eaf2;
        border-radius: 12px;
        padding: 24px;
        box-shadow: 0 1px 6px rgba(0,0,0,0.04);
        margin-bottom: 24px;
    }

    /* Form elements */
    .admin-form-group { margin-bottom: 20px; }
    .admin-label {
        display: block;
        font-size: 0.83rem;
        font-weight: 600;
        color: #334155;
        margin-bottom: 6px;
    }
    .admin-input,
    .admin-textarea,
    .admin-select {
        width: 100%;
        padding: 9px 12px;
        border: 1.5px solid #d1dbe8;
        border-radius: 8px;
        font-size: 0.88rem;
        color: #334155;
        background: #ffffff;
        outline: none;
        transition: border-color 0.15s ease;
        box-sizing: border-box;
        font-family: inherit;
    }
    .admin-input:focus,
    .admin-textarea:focus,
    .admin-select:focus { border-color: #003d6a; box-shadow: 0 0 0 3px rgba(0,61,106,0.07); }
    .admin-textarea { resize: vertical; min-height: 100px; }
    .admin-input-hint {
        font-size: 0.75rem;
        color: #94a3b8;
        margin-top: 5px;
    }

    /* Pagination */
    .admin-pagination { display: flex; justify-content: flex-end; padding: 14px; border-top: 1px solid #f1f5f9; }

    @media (max-width: 768px) {
        .admin-sidebar { width: 64px; overflow: hidden; }
        .admin-sidebar-logo-text,
        .admin-nav-group-label,
        .admin-nav-link span,
        .admin-nav-badge,
        .admin-sidebar-user-name,
        .admin-sidebar-user-role,
        .admin-logout-btn span { display: none; }
        .admin-main { margin-left: 64px; }
        .admin-content { padding: 16px; }
    }
    </style>
    @stack('styles')
</head>
<body class="admin-body">

    {{-- ===== SIDEBAR ===== --}}
    <aside class="admin-sidebar">
        <a href="{{ route('admin.dashboard') }}" class="admin-sidebar-logo">
            <div class="admin-sidebar-logo-icon">🏛️</div>
            <div class="admin-sidebar-logo-text">
                Diciptabintar
                <span class="admin-sidebar-logo-sub">Panel Admin</span>
            </div>
        </a>

        <nav class="admin-nav">
            <div class="admin-nav-group-label">Utama</div>

            <a href="{{ route('admin.dashboard') }}"
               class="admin-nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                <svg fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M3.75 6A2.25 2.25 0 016 3.75h2.25A2.25 2.25 0 0110.5 6v2.25a2.25 2.25 0 01-2.25 2.25H6a2.25 2.25 0 01-2.25-2.25V6zM3.75 15.75A2.25 2.25 0 016 13.5h2.25a2.25 2.25 0 012.25 2.25V18a2.25 2.25 0 01-2.25 2.25H6A2.25 2.25 0 013.75 18v-2.25zM13.5 6a2.25 2.25 0 012.25-2.25H18A2.25 2.25 0 0120.25 6v2.25A2.25 2.25 0 0118 10.5h-2.25a2.25 2.25 0 01-2.25-2.25V6zM13.5 15.75a2.25 2.25 0 012.25-2.25H18a2.25 2.25 0 012.25 2.25V18A2.25 2.25 0 0118 20.25h-2.25A2.25 2.25 0 0113.5 18v-2.25z"/>
                </svg>
                <span>Dashboard</span>
            </a>

            <div class="admin-nav-group-label">Konten</div>

            <a href="{{ route('admin.instagram.index') }}"
               class="admin-nav-link {{ request()->routeIs('admin.instagram.*') ? 'active' : '' }}">
                <svg fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M6.827 6.175A2.31 2.31 0 015.186 7.23c-.38.054-.757.112-1.134.175C2.999 7.58 2.25 8.507 2.25 9.574V18a2.25 2.25 0 002.25 2.25h15A2.25 2.25 0 0021.75 18V9.574c0-1.067-.75-1.994-1.802-2.169a47.865 47.865 0 00-1.134-.175 2.31 2.31 0 01-1.64-1.055l-.822-1.316a2.192 2.192 0 00-1.736-1.039 48.774 48.774 0 00-5.232 0 2.192 2.192 0 00-1.736 1.039l-.821 1.316z"/><path stroke-linecap="round" stroke-linejoin="round" d="M16.5 12.75a4.5 4.5 0 11-9 0 4.5 4.5 0 019 0zM18.75 10.5h.008v.008h-.008V10.5z"/>
                </svg>
                <span>Postingan Instagram</span>
            </a>

            <a href="{{ route('admin.services.index') }}"
               class="admin-nav-link {{ request()->routeIs('admin.services.*') ? 'active' : '' }}">
                <svg fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M9 12h3.75M9 15h3.75M9 18h3.75m3 .75H18a2.25 2.25 0 002.25-2.25V6.108c0-1.135-.845-2.098-1.976-2.192a48.424 48.424 0 00-1.123-.08m-5.801 0c-.065.21-.1.433-.1.664 0 .414.336.75.75.75h4.5a.75.75 0 00.75-.75 2.25 2.25 0 00-.1-.664m-5.8 0A2.251 2.251 0 0113.5 2.25H15c1.012 0 1.867.668 2.15 1.586m-5.8 0c-.376.023-.75.05-1.124.08C9.095 4.01 8.25 4.973 8.25 6.108V8.25m0 0H4.875c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V9.375c0-.621-.504-1.125-1.125-1.125H8.25zM6.75 12h.008v.008H6.75V12zm0 3h.008v.008H6.75V15zm0 3h.008v.008H6.75V18z"/>
                </svg>
                <span>Layanan Publik</span>
            </a>

            <a href="{{ route('admin.portfolios.index') }}"
               class="admin-nav-link {{ request()->routeIs('admin.portfolios.*') ? 'active' : '' }}">
                <svg fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M2.25 15.75l5.159-5.159a2.25 2.25 0 013.182 0l5.159 5.159m-1.5-1.5l1.409-1.409a2.25 2.25 0 013.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 001.5-1.5V6a1.5 1.5 0 00-1.5-1.5H3.75A1.5 1.5 0 002.25 6v12a1.5 1.5 0 001.5 1.5zm10.5-11.25h.008v.008h-.008V8.25zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z"/>
                </svg>
                <span>Portofolio</span>
            </a>

            <div class="admin-nav-group-label">Pengguna</div>

            <a href="{{ route('admin.contact.index') }}"
               class="admin-nav-link {{ request()->routeIs('admin.contact.*') ? 'active' : '' }}">
                <svg fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75"/>
                </svg>
                <span>Pesan Kontak</span>
                @php $unread = \App\Models\ContactMessage::unread()->count(); @endphp
                @if($unread > 0)
                    <span class="admin-nav-badge">{{ $unread }}</span>
                @endif
            </a>

        </nav>

        <div class="admin-sidebar-footer">
            <div class="admin-sidebar-user">
                <div class="admin-sidebar-user-avatar">
                    {{ strtoupper(substr(Auth::user()->name ?? 'A', 0, 1)) }}
                </div>
                <div>
                    <div class="admin-sidebar-user-name">{{ Auth::user()->name ?? 'Admin' }}</div>
                    <span class="admin-sidebar-user-role">Administrator</span>
                </div>
            </div>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="admin-logout-btn">
                    <svg width="16" height="16" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15M12 9l-3 3m0 0l3 3m-3-3h12.75"/>
                    </svg>
                    <span>Keluar</span>
                </button>
            </form>
        </div>
    </aside>

    {{-- ===== MAIN CONTENT ===== --}}
    <div class="admin-main">

        {{-- Topbar --}}
        <header class="admin-topbar">
            <h1 class="admin-topbar-title">@yield('page-title', 'Dashboard')</h1>
            <div class="admin-topbar-right">
                <a href="{{ route('home') }}" target="_blank" class="admin-view-site-btn">
                    <svg width="14" height="14" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 6H5.25A2.25 2.25 0 003 8.25v10.5A2.25 2.25 0 005.25 21h10.5A2.25 2.25 0 0018 18.75V10.5m-10.5 6L21 3m0 0h-5.25M21 3v5.25"/>
                    </svg>
                    Lihat Situs
                </a>
            </div>
        </header>

        {{-- Flash messages --}}
        <div style="padding: 0 28px; margin-top: 16px;">
            @if(session('success'))
                <div class="admin-alert admin-alert-success">
                    <svg width="18" height="18" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" style="flex-shrink:0">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                    {{ session('success') }}
                </div>
            @endif
            @if(session('error') || $errors->any())
                <div class="admin-alert admin-alert-error">
                    <svg width="18" height="18" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" style="flex-shrink:0">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m9-.75a9 9 0 11-18 0 9 9 0 0118 0zm-9 3.75h.008v.008H12v-.008z"/>
                    </svg>
                    <div>
                        {{ session('error') }}
                        @if($errors->any())
                            <ul style="margin:6px 0 0; padding-left:18px;">
                                @foreach($errors->all() as $e) <li>{{ $e }}</li> @endforeach
                            </ul>
                        @endif
                    </div>
                </div>
            @endif
        </div>

        {{-- Page content --}}
        <main class="admin-content">
            @yield('content')
        </main>
    </div>

    @stack('scripts')
</body>
</html>
