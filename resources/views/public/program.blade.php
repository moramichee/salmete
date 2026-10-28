@extends('layouts.app')

@section('title', 'Programme')
@section('breadcrumb', 'Programme')
@section('page-title', 'Programme & composantes')
@section('page-subtitle', 'Une approche immersive et interactive axée sur « l’apprentissage par le faire »')

@section('content')
@include('partials.page-hero')

<section class="section">
    <div class="container">
        <h2 class="section-title">Les 6 composantes opérationnelles</h2>
        <div class="row g-4">
            @foreach ($components as $component)
                <div class="col-lg-6">
                    <div class="card h-100 p-4">
                        <div class="d-flex gap-3">
                            <span class="icon-circle flex-shrink-0"><i class="bi {{ $component->icon }}"></i></span>
                            <div>
                                <h3 class="h5 text-brand">{{ $component->title }}</h3>
                                <p class="text-muted mb-2">{{ $component->summary }}</p>
                                <p class="small text-muted mb-0">{!! nl2br(e($component->description)) !!}</p>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

<section class="section odd-section">
    <div class="container">
        <h2 class="section-title">Agenda détaillé — 3 jours</h2>
        @forelse ($schedule as $dayLabel => $items)
            <div class="agenda-day mb-5">
                <div class="day-header"><i class="bi bi-calendar3 me-2"></i>{{ $dayLabel }}</div>
                <div class="card" style="border-radius:0 0 .75rem .75rem;">
                    @foreach ($items as $item)
                        <div class="agenda-row">
                            <div class="agenda-time">{{ $item->time_range }}</div>
                            <div>
                                <div class="fw-semibold">{{ $item->title }}</div>
                                @if ($item->description)
                                    <p class="small text-muted mb-1">{{ $item->description }}</p>
                                @endif
                                @if ($item->location)
                                    <span class="agenda-location"><i class="bi bi-geo-alt me-1"></i>{{ $item->location }}</span>
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @empty
            <p class="text-muted">L'agenda sera publié prochainement.</p>
        @endforelse

        <div class="text-center mt-4">
            <a href="{{ route('registrations.create') }}" class="btn btn-brand btn-lg"><i class="bi bi-pencil-square me-2"></i>S'inscrire aux ateliers</a>
        </div>
    </div>
</section>
@endsection
