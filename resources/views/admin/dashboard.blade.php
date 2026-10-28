@extends('layouts.admin')

@section('title', 'Tableau de bord')

@section('content')
<h1 class="h3 text-brand mb-4">Tableau de bord</h1>

<div class="row g-3 mb-4 admin-stat">
    @foreach ([
        ['Inscriptions', $counts['registrations'], 'bi-pencil-square', 'admin.inscriptions.index', $counts['newRegistrations'] . ' nouvelle(s)'],
        ['Messages reçus', $counts['messages'], 'bi-envelope', 'admin.messages.index', $counts['unreadMessages'] . ' non lu(s)'],
        ['Partenaires', $counts['partners'], 'bi-people', 'admin.partenaires.index', null],
        ['Photos galerie', $counts['galleries'], 'bi-images', 'admin.galerie.index', null],
        ['Composantes', $counts['components'], 'bi-grid-3x3-gap', 'admin.composantes.index', null],
        ['Créneaux agenda', $counts['schedule'], 'bi-calendar3', 'admin.agenda.index', null],
        ['Formules sponsoring', $counts['offers'], 'bi-cash-coin', 'admin.sponsoring.index', null],
    ] as $stat)
        <div class="col-6 col-md-4 col-xl-3">
            <a href="{{ route($stat[3]) }}" class="text-decoration-none">
                <div class="card p-3 h-100">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <div class="h2 mb-0 text-brand fw-bold">{{ $stat[1] }}</div>
                            <div class="small text-muted fw-semibold">{{ $stat[0] }}</div>
                            @if ($stat[4])
                                <span class="badge bg-warning text-dark mt-1">{{ $stat[4] }}</span>
                            @endif
                        </div>
                        <i class="bi {{ $stat[2] }} stat-icon"></i>
                    </div>
                </div>
            </a>
        </div>
    @endforeach
</div>

<div class="row g-4">
    <div class="col-lg-7">
        <div class="card">
            <div class="card-header bg-white d-flex justify-content-between align-items-center">
                <h2 class="h6 mb-0 text-brand">Dernières inscriptions</h2>
                <a href="{{ route('admin.inscriptions.index') }}" class="small">Tout voir</a>
            </div>
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead>
                        <tr>
                            <th>Nom</th>
                            <th>Type</th>
                            <th>Statut</th>
                            <th>Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($latestRegistrations as $registration)
                            <tr>
                                <td>
                                    <a href="{{ route('admin.inscriptions.show', $registration) }}" class="fw-semibold text-decoration-none">
                                        {{ $registration->full_name }}
                                    </a>
                                </td>
                                <td><span class="badge {{ $registration->type === 'exposant' ? 'bg-warning text-dark' : 'bg-success' }}">
                                    {{ \App\Models\Registration::TYPES[$registration->type] ?? $registration->type }}
                                </span></td>
                                <td><span class="badge bg-{{ $registration->statusBadge() }}">
                                    {{ \App\Models\Registration::STATUS[$registration->status] ?? $registration->status }}
                                </span></td>
                                <td class="small text-muted">{{ $registration->created_at->format('d/m/Y H:i') }}</td>
                            </tr>
                        @empty
                            <tr><td colspan="4" class="text-center text-muted py-4">Aucune inscription pour le moment.</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="col-lg-5">
        <div class="card">
            <div class="card-header bg-white d-flex justify-content-between align-items-center">
                <h2 class="h6 mb-0 text-brand">Derniers messages</h2>
                <a href="{{ route('admin.messages.index') }}" class="small">Tout voir</a>
            </div>
            <ul class="list-group list-group-flush">
                @forelse ($latestMessages as $message)
                    <li class="list-group-item d-flex justify-content-between align-items-start gap-2">
                        <a href="{{ route('admin.messages.show', $message) }}" class="text-decoration-none text-body">
                            <div class="fw-semibold {{ $message->is_read ? '' : 'text-brand' }}">
                                @if (! $message->is_read)<i class="bi bi-dot text-gold fs-5"></i>@endif
                                {{ $message->subject ?: 'Message sans sujet' }}
                            </div>
                            <small class="text-muted">{{ $message->name }} — {{ $message->created_at->diffForHumans() }}</small>
                        </a>
                    </li>
                @empty
                    <li class="list-group-item text-center text-muted py-4">Aucun message reçu.</li>
                @endforelse
            </ul>
        </div>
    </div>
</div>
@endsection
