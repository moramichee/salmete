@extends('layouts.app')

@section('title', 'Sponsoring')
@section('breadcrumb', 'Sponsoring')
@section('page-title', 'Partenariats & mécénat')
@section('page-subtitle', 'Investissez dans l’avenir du territoire')

@section('content')
@include('partials.page-hero')

<section class="section">
    <div class="container">
        <h2 class="section-title text-center">Pourquoi devenir partenaire ?</h2>
        <div class="row g-4">
            @foreach ([
                ['bi-bullseye', 'Incarner votre RSE', 'Affirmez votre leadership en faveur de l’emploi des jeunes, de l’entrepreneuriat féminin et de la résilience climatique.'],
                ['bi-lightbulb', 'Soutenir des solutions concrètes', 'Propulsez des innovations locales à fort impact économique et environnemental.'],
                ['bi-megaphone', 'Maximiser votre visibilité', 'Associez votre image à un événement phare, largement médiatisé à l’échelle régionale et nationale.'],
                ['bi-person-badge', 'Accéder à un vivier de talents', 'Identifiez en avant-première les meilleurs profils techniques et les futurs champions de l’agroécologie.'],
            ] as $reason)
                <div class="col-md-6 col-lg-3">
                    <div class="card h-100 p-4 text-center">
                        <span class="icon-circle mx-auto mb-3"><i class="bi {{ $reason[0] }}"></i></span>
                        <h3 class="h6 text-brand">{{ $reason[1] }}</h3>
                        <p class="small text-muted mb-0">{{ $reason[2] }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

<section class="section odd-section">
    <div class="container">
        <h2 class="section-title text-center">Formes de soutien & options de sponsoring</h2>
        <div class="row g-4">
            @foreach ($offers as $offer)
                <div class="col-md-6 col-lg-4">
                    <div class="card pricing-card h-100 {{ $offer->badge ? 'featured' : '' }}">
                        <div class="card-header-pricing">
                            @if ($offer->badge)
                                <span class="badge bg-gold text-dark mb-2">{{ $offer->badge }}</span>
                            @endif
                            <h3 class="h6 text-brand mb-1">{{ $offer->name }}</h3>
                            <div class="price">
                                @if ($offer->price > 0)
                                    {{ number_format($offer->price, 0, ',', ' ') }} FCFA
                                @else
                                    {{ trim($offer->price_note ?? 'Sur devis') }}
                                @endif
                            </div>
                            @if ($offer->price > 0 && $offer->price_note)
                                <small class="text-muted">{{ $offer->price_note }}</small>
                            @endif
                        </div>
                        <div class="card-body">
                            @if ($offer->description)
                                <p class="text-muted small">{{ $offer->description }}</p>
                            @endif
                            @if ($offer->features)
                                <ul class="list-unstyled small d-grid gap-2 mb-0">
                                    @foreach (array_filter(array_map('trim', explode("\n", $offer->features))) as $feature)
                                        <li><i class="bi bi-check-circle-fill text-brand me-2"></i>{{ $feature }}</li>
                                    @endforeach
                                </ul>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <p class="text-center text-muted small mt-4">
            <i class="bi bi-info-circle me-1"></i>Les tarifs s'entendent pour la durée totale du salon (3 jours). Une facture et une convention de partenariat sont établies pour chaque soutien.
        </p>
    </div>
</section>

<section class="py-5 bg-brand text-white text-center">
    <div class="container">
        <h2 class="fw-bold mb-3">Vous souhaitez sponsoriser le SaLMeTE ?</h2>
        <p class="lead mb-4">Déposez votre demande via le formulaire d'inscription « exposant / sponsor » ou écrivez-nous directement.</p>
        <a href="{{ route('registrations.create') }}?type=exposant" class="btn btn-gold btn-lg me-2"><i class="bi bi-pencil-square me-2"></i>Déposer une demande</a>
        <a href="{{ route('contact') }}" class="btn btn-outline-light btn-lg">Nous écrire</a>
    </div>
</section>
@endsection
