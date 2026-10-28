<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="{{ \App\Models\Setting::get('site_tagline') }} — {{ \App\Models\Setting::get('event_dates') }} à {{ strip_tags(\App\Models\Setting::get('event_location')) }}.">
    <title>@yield('title', \App\Models\Setting::get('site_name')) — {{ \App\Models\Setting::get('site_tagline') }}</title>
    @vite(['resources/scss/app.scss', 'resources/js/app.js'])
    <link rel="icon" href="data:image/svg+xml,<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 100 100'><rect width='100' height='100' rx='20' fill='%230b5d3b'/><text x='50' y='68' font-size='52' text-anchor='middle' fill='%23f2b705' font-family='sans-serif' font-weight='bold'>S</text></svg>">
</head>
<body>
    @include('partials.public-navbar')

    <main>
        @include('partials.flash')
        @yield('content')
    </main>

    @include('partials.public-footer')
    @stack('scripts')
</body>
</html>
