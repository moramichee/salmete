<section class="page-hero">
    <div class="container">
        <h1>@yield('page-title', $title ?? '')</h1>
        @hasSection('page-subtitle')
            <p class="mb-0 mt-2 text-white-50">@yield('page-subtitle')</p>
        @endif
    </div>
</section>
