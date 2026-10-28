@extends('layouts.app')

@section('title', 'Accueil')

@section('content')
{{-- ============================================================= HERO --}}
<section class="hero">
    <div class="container">
        <div class="row">
            <div class="col-lg-10">
                <span class="hero-badge mb-3"><i class="bi bi-stars me-1"></i>{{ \App\Models\Setting::get('site_edition') }}</span>
                <h1 class="mt-3 mb-3">{{ \App\Models\Setting::get('site_tagline') }}</h1>
                <p class="hero-subtitle">{{ \App\Models\Setting::get('hero_theme') }}</p>

                <div class="hero-meta row g-3 my-4">
                    <div class="col-sm-auto">
                        <div class="meta-item d-flex align-items-center gap-2">
                            <i class="bi bi-calendar-event"></i>
                            <span>{{ \App\Models\Setting::get('event_dates') }}</span>
                        </div>
                    </div>
                    <div class="col-sm-auto">
                        <div class="meta-item d-flex align-items-center gap-2">
                            <i class="bi bi-geo-alt"></i>
                            <span>{{ \App\Models\Setting::get('event_location') }}</span>
                        </div>
                    </div>
                </div>

                <div class="d-flex flex-wrap gap-3">
                    <a href="{{ route('registrations.create') }}" class="btn btn-gold btn-lg">
                        <i class="bi bi-pencil-square me-2"></i>Je m'inscris
                    </a>
                    <a href="{{ route('program') }}" class="btn btn-outline-light btn-lg">
                        Découvrir le programme
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ============================================================= INTRO + STATS --}}
<section class="section">
    <div class="container">
        <div class="row align-items-center g-5">
            <div class="col-lg-6">
                <h2 class="section-title">Un carrefour des métiers techniques et écologiques</h2>
                <p class="lead-soft">{{ \App\Models\Setting::get('home_intro') }}</p>
                <p class="text-muted">Organisé à Natitingou, capitale de l'Atacora, le salon s'appuie sur une approche immersive et interactive axée sur « l'apprentissage par le faire », pour connecter jeunes talents, artisans, centres de formation, entreprises et décideurs du territoire.</p>
                <a href="{{ route('about') }}" class="btn btn-outline-brand mt-2">En savoir plus sur le salon</a>
            </div>
            <div class="col-lg-6">
                <div class="row g-3">
                    @foreach (['stat_participants' => 'bi-people', 'stat_exposants' => 'bi-shop', 'stat_partnerships' => 'bi-handshake', 'stat_youth' => 'bi-mortarboard', 'stat_awards' => 'bi-trophy'] as $key => $icon)
                        <div class="col-6 col-md-4">
                            <div class="stat-card">
                                <i class="bi {{ $icon }} fs-3 text-gold"></i>
                                <div class="stat-number">{{ \App\Models\Setting::get($key) }}</div>
                                <div class="stat-label">{{ \App\Models\Setting::get($key . '_label') }}</div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ============================================================= 3 MISSIONS --}}
<section class="section odd-section">
    <div class="container">
        <h2 class="section-title text-center">Les trois fonctions du salon</h2>
        <div class="row g-4">
            <div class="col-md-4">
                <div class="card h-100 p-4">
                    <span class="icon-circle mb-3"><i class="bi bi-compass"></i></span>
                    <h3 class="h5 text-brand">Espace clé d'orientation</h3>
                    <p class="text-muted mb-0">Un cadre immersif pour découvrir concrètement les métiers du futur, tester des équipements en direct et échanger avec des centres de formation, des formateurs et des mentors.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card h-100 p-4">
                    <span class="icon-circle icon-circle-gold mb-3"><i class="bi bi-shop-window"></i></span>
                    <h3 class="h5 text-brand">Vitrine commerciale « Go-To-Market »</h3>
                    <p class="text-muted mb-0">Les jeunes innovateurs et artisans sortent de l'isolement : démonstrations dynamiques « par le faire » pour prouver la fiabilité et la rentabilité de leurs technologies.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card h-100 p-4">
                    <span class="icon-circle mb-3"><i class="bi bi-diagram-3"></i></span>
                    <h3 class="h5 text-brand">Hub de maillage B2B</h3>
                    <p class="text-muted mb-0">La connexion directe Formation – Entreprise – Territoire : contrats, stages, apprentissages et financement du passage à l'échelle des innovations locales.</p>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ============================================================= COMPOSANTES --}}
<section class="section">
    <div class="container">
        <div class="d-flex flex-wrap justify-content-between align-items-end mb-4">
            <h2 class="section-title mb-0">Les 6 composantes du SaLMeTE</h2>
            <a href="{{ route('program') }}" class="btn btn-outline-brand">Voir l'agenda détaillé</a>
        </div>
        <div class="row g-4">
            @foreach ($components as $component)
                <div class="col-lg-4 col-md-6">
                    <div class="card h-100 p-4">
                        <span class="icon-circle mb-3"><i class="bi {{ $component->icon }}"></i></span>
                        <h3 class="h5 text-brand">{{ $component->title }}</h3>
                        <p class="text-muted mb-0">{{ $component->summary }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

{{-- ============================================================= AGENDA APERCU --}}
<section class="section odd-section">
    <div class="container">
        <h2 class="section-title">Prochains rendez-vous de l'agenda</h2>
        <div class="card">
            <div class="table-responsive">
                <table class="table align-middle mb-0">
                    <thead>
                        <tr>
                            <th>Jour</th>
                            <th>Horaire</th>
                            <th>Session</th>
                            <th class="d-none d-md-table-cell">Lieu</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($nextSessions as $session)
                            <tr>
                                <td class="fw-semibold text-brand text-nowrap">{{ $session->day_label }}</td>
                                <td class="text-nowrap">{{ $session->time_range }}</td>
                                <td>{{ $session->title }}</td>
                                <td class="d-none d-md-table-cell text-muted"><i class="bi bi-geo-alt text-gold me-1"></i>{{ $session->location }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>

{{-- ============================================================= GALERIE APERCU --}}
<section class="section">
    <div class="container">
        <div class="d-flex flex-wrap justify-content-between align-items-end mb-4">
            <h2 class="section-title mb-0">Retour en images</h2>
            <a href="{{ route('gallery') }}" class="btn btn-outline-brand">Toute la galerie</a>
        </div>
        <div class="row g-3">
            @foreach ($galleries as $photo)
                <div class="col-6 col-md-3">
                    <a href="{{ route('gallery') }}" class="gallery-item">
                        <img src="{{ \Illuminate\Support\Facades\Storage::url($photo->image) }}" alt="{{ $photo->title }}" loading="lazy">
                        <span class="gallery-caption"><small>{{ $photo->category }}</small>{{ $photo->title }}</span>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</section>

{{-- ============================================================= PARTENAIRES --}}
<section class="section odd-section">
    <div class="container">
        <h2 class="section-title text-center">Ils soutiennent le SaLMeTE</h2>
        <div class="row g-3">
            @foreach ($partners as $partner)
                <div class="col-6 col-md-3 col-lg-2">
                    <div class="partner-card">
                        @if ($partner->logo)
                            <img src="{{ \Illuminate\Support\Facades\Storage::url($partner->logo) }}" alt="{{ $partner->name }}" class="partner-logo">
                        @else
                            <div class="partner-initials">{{ \Illuminate\Support\Str::of($partner->name)->substr(0, 2)->upper() }}</div>
                        @endif
                        <div class="partner-name">{{ $partner->name }}</div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="text-center mt-4">
            <a href="{{ route('partners') }}" class="btn btn-outline-brand">Tous les partenaires</a>
        </div>
    </div>
</section>

{{-- ============================================================= CTA --}}
<section class="py-5 bg-brand text-white text-center">
    <div class="container py-3">
        <h2 class="fw-bold mb-3">Investissez dans l'avenir du territoire</h2>
        <p class="lead mb-4" style="max-width:720px;margin-inline:auto;">
            Devenez partenaire ou mécène du SaLMeTE 2026 : incarnez votre RSE, soutenez des innovations locales à fort impact et accédez à un vivier de talents techniques.
        </p>
        <div class="d-flex flex-wrap justify-content-center gap-3">
            <a href="{{ route('sponsoring') }}" class="btn btn-gold btn-lg"><i class="bi bi-megaphone me-2"></i>Devenir sponsor</a>
            <a href="{{ route('registrations.create') }}" class="btn btn-outline-light btn-lg">S'inscrire au salon</a>
        </div>
    </div>
</section>
@endsection
