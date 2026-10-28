<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Connexion admin — {{ \App\Models\Setting::get('site_name') }}</title>
    @vite(['resources/scss/app.scss', 'resources/js/app.js'])
    <link rel="icon" href="data:image/svg+xml,<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 100 100'><rect width='100' height='100' rx='20' fill='%230b5d3b'/><text x='50' y='68' font-size='52' text-anchor='middle' fill='%23f2b705' font-family='sans-serif' font-weight='bold'>S</text></svg>">
</head>
<body class="bg-brand-soft">
    <div class="container" style="min-height:100vh;" >
        <div class="row justify-content-center align-items-center" style="min-height:100vh;">
            <div class="col-md-6 col-lg-5">
                <div class="text-center mb-4">
                    <span class="brand-mark d-inline-flex align-items-center justify-content-center"
                          style="width:58px;height:58px;border-radius:14px;background:#0b5d3b;color:#f2b705;font-size:1.7rem;">
                        <i class="bi bi-droplet-half"></i>
                    </span>
                    <h1 class="h3 text-brand mt-3 mb-0">SaLMeTE 2026</h1>
                    <p class="text-muted">Espace d'administration</p>
                </div>
                <div class="card p-4 p-md-5">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0 ps-4">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('login') }}" class="d-grid gap-3">
                        @csrf
                        <div>
                            <label for="email" class="form-label">Adresse e-mail</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="bi bi-envelope"></i></span>
                                <input type="email" id="email" name="email" value="{{ old('email') }}"
                                       class="form-control" required autofocus>
                            </div>
                        </div>
                        <div>
                            <label for="password" class="form-label">Mot de passe</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="bi bi-lock"></i></span>
                                <input type="password" id="password" name="password" class="form-control" required>
                            </div>
                        </div>
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="remember" name="remember" value="1">
                            <label class="form-check-label" for="remember">Se souvenir de moi</label>
                        </div>
                        <button type="submit" class="btn btn-brand btn-lg mt-2">
                            <i class="bi bi-box-arrow-in-right me-2"></i>Se connecter
                        </button>
                    </form>
                </div>
                <p class="text-center mt-4">
                    <a href="{{ route('home') }}" class="text-muted small"><i class="bi bi-arrow-left me-1"></i>Retour au site public</a>
                </p>
            </div>
        </div>
    </div>
</body>
</html>
