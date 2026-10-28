@extends('layouts.app')

@section('title', 'Partenaires')
@section('breadcrumb', 'Partenaires')
@section('page-title', 'Nos partenaires')
@section('page-subtitle', 'Un écosystème d’acteurs mobilisés pour la jeunesse, l’emploi local et la résilience climatique')

@section('content')
@include('partials.page-hero')

<section class="section">
    <div class="container">
        @forelse ($partners as $category => $group)
            <h2 class="section-title">{{ $category }} <span class="text-muted fs-5">({{ $group->count() }})</span></h2>
            <div class="row g-3 mb-5">
                @foreach ($group as $partner)
                    <div class="col-6 col-md-4 col-lg-3">
                        <div class="partner-card">
                            @if ($partner->logo)
                                <img src="{{ \Illuminate\Support\Facades\Storage::url($partner->logo) }}" alt="{{ $partner->name }}" class="partner-logo">
                            @else
                                <div class="partner-initials">{{ \Illuminate\Support\Str::of($partner->name)->substr(0, 2)->upper() }}</div>
                            @endif
                            <div class="partner-cat">{{ $partner->category }}</div>
                            <div class="partner-name">{{ $partner->name }}</div>
                            @if ($partner->description)
                                <p class="small text-muted mt-2 mb-0">{{ $partner->description }}</p>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
        @empty
            <p class="text-muted">La liste des partenaires sera actualisée prochainement.</p>
        @endforelse
    </div>
</section>

<section class="py-5 bg-brand text-white text-center">
    <div class="container">
        <h2 class="fw-bold mb-3">Rejoindre l'écosystème SaLMeTE</h2>
        <p class="lead mb-4">Associez votre image à un événement phare, médiatisé à l'échelle régionale et nationale.</p>
        <a href="{{ route('sponsoring') }}" class="btn btn-gold btn-lg me-2"><i class="bi bi-megaphone me-2"></i>Voir les formules de sponsoring</a>
        <a href="{{ route('contact') }}" class="btn btn-outline-light btn-lg">Nous contacter</a>
    </div>
</section>
@endsection
