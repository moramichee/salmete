<nav class="navbar navbar-expand-lg sticky-top site-navbar">
    <div class="container">
        <a class="navbar-brand d-flex align-items-center" href="{{ route('home') }}">
            @php
                $siteLogo = \App\Models\Setting::get('site_logo');
            @endphp
            <img src="{{ $siteLogo ? Storage::disk('public')->url($siteLogo) : asset('images/brand/logo-mark.png') }}" alt="Logo SaLMeTE" class="brand-mark">
            <span>
                SaLMeTE <span class="text-gold">2026</span>
                <small class="d-block text-muted fw-normal" style="font-size:.68rem;line-height:1;">Salon Local des Métiers Techniques et Écologiques</small>
            </span>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNav"
                aria-controls="mainNav" aria-expanded="false" aria-label="Menu de navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="mainNav">
            <ul class="navbar-nav ms-auto align-items-lg-center">
                @php
                    $links = [
                        ['route' => 'home', 'label' => 'Accueil'],
                        ['route' => 'about', 'label' => 'À propos'],
                        ['route' => 'program', 'label' => 'Programme'],
                        ['route' => 'exhibitors', 'label' => 'Exposants'],
                        ['route' => 'gallery', 'label' => 'Galerie'],
                        ['route' => 'partners', 'label' => 'Partenaires'],
                        ['route' => 'sponsoring', 'label' => 'Sponsoring'],
                        ['route' => 'contact', 'label' => 'Contact'],
                    ];
                @endphp
                @foreach ($links as $link)
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs($link['route']) ? 'active' : '' }}"
                           href="{{ route($link['route']) }}">{{ $link['label'] }}</a>
                    </li>
                @endforeach
                <li class="nav-item ms-lg-2 mt-2 mt-lg-0">
                    <a href="{{ route('registrations.create') }}" class="btn btn-gold btn-sm">
                        <i class="bi bi-pencil-square me-1"></i>S'inscrire
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
