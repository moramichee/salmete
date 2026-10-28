<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Administration') — Admin SaLMeTE 2026</title>
    @vite(['resources/scss/app.scss', 'resources/js/app.js'])
    <link rel="icon" href="data:image/svg+xml,<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 100 100'><rect width='100' height='100' rx='20' fill='%230b5d3b'/><text x='50' y='68' font-size='52' text-anchor='middle' fill='%23f2b705' font-family='sans-serif' font-weight='bold'>S</text></svg>">
</head>
<body class="admin-body">
<div class="container-fluid">
    <div class="row">
        {{-- Sidebar --}}
        <aside class="col-lg-2 col-md-3 col-12 admin-sidebar p-0">
            <a href="{{ route('admin.dashboard') }}" class="sidebar-brand">
                <i class="bi bi-droplet-half me-2"></i>SaLMeTE Admin
            </a>
            <nav class="nav flex-column py-3">
                @php
                    $newReg = \App\Models\Registration::where('status', 'nouveau')->count();
                    $unread = \App\Models\ContactMessage::where('is_read', false)->count();
                    $nav = [
                        ['route' => 'admin.dashboard', 'label' => 'Tableau de bord', 'icon' => 'bi-speedometer2', 'active' => 'admin/dashboard'],
                        ['route' => 'admin.composantes.index', 'label' => 'Composantes', 'icon' => 'bi-grid-3x3-gap', 'active' => 'admin/composantes'],
                        ['route' => 'admin.agenda.index', 'label' => 'Agenda', 'icon' => 'bi-calendar3', 'active' => 'admin/agenda'],
                        ['route' => 'admin.partenaires.index', 'label' => 'Partenaires', 'icon' => 'bi-people', 'active' => 'admin/partenaires'],
                        ['route' => 'admin.sponsoring.index', 'label' => 'Sponsoring', 'icon' => 'bi-cash-coin', 'active' => 'admin/sponsoring'],
                        ['route' => 'admin.galerie.index', 'label' => 'Galerie photos', 'icon' => 'bi-images', 'active' => 'admin/galerie'],
                        ['route' => 'admin.inscriptions.index', 'label' => 'Inscriptions', 'icon' => 'bi-pencil-square', 'active' => 'admin/inscriptions', 'badge' => $newReg],
                        ['route' => 'admin.messages.index', 'label' => 'Messages', 'icon' => 'bi-envelope', 'active' => 'admin/messages', 'badge' => $unread],
                        ['route' => 'admin.settings.edit', 'label' => 'Paramètres', 'icon' => 'bi-gear', 'active' => 'admin/parametres'],
                    ];
                @endphp
                @foreach ($nav as $item)
                    <a class="nav-link {{ request()->is($item['active'] . '*') ? 'active' : '' }}" href="{{ route($item['route']) }}">
                        <i class="bi {{ $item['icon'] }}"></i>
                        {{ $item['label'] }}
                        @if (!empty($item['badge']) && $item['badge'] > 0)
                            <span class="badge bg-danger float-end">{{ $item['badge'] }}</span>
                        @endif
                    </a>
                @endforeach
            </nav>
        </aside>

        {{-- Contenu --}}
        <div class="col-lg-10 col-md-9 col-12 p-0">
            <header class="admin-topbar d-flex flex-wrap justify-content-between align-items-center gap-2">
                <div>
                    <a href="{{ route('home') }}" target="_blank" class="text-decoration-none small text-muted">
                        <i class="bi bi-box-arrow-up-right me-1"></i>Voir le site public
                    </a>
                </div>
                <div class="dropdown">
                    <button class="btn btn-sm btn-light dropdown-toggle" type="button" data-bs-toggle="dropdown">
                        <i class="bi bi-person-circle me-1"></i>{{ auth()->user()->name }}
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li>
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button type="submit" class="dropdown-item text-danger">
                                    <i class="bi bi-box-arrow-right me-2"></i>Déconnexion
                                </button>
                            </form>
                        </li>
                    </ul>
                </div>
            </header>

            <main class="p-3 p-md-4">
                @include('partials.flash')
                @yield('content')
            </main>
        </div>
    </div>
</div>
@stack('scripts')
</body>
</html>
