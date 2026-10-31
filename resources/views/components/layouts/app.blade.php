@props([
    'title' => null,
    'description' => config('elevatis.description'),
    'image' => asset('images/og-elevatis.jpg'),
])

@php
    $fullTitle = $title
        ? $title.' | '.config('elevatis.name')
        : config('elevatis.name').' – '.config('elevatis.tagline').' | Coach de vie à Douala';
    $contact = config('elevatis.contact');
@endphp

<!DOCTYPE html>
<html lang="fr" @class(['no-js scroll-pt-28', 'has-cinematic-header' => request()->routeIs('home', 'about', 'services', 'pricing', 'testimonials', 'contact')])>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $fullTitle }}</title>
    <meta name="description" content="{{ $description }}">
    <link rel="canonical" href="{{ url()->current() }}">
    <meta name="theme-color" content="#315581">

    <meta property="og:type" content="website">
    <meta property="og:locale" content="fr_FR">
    <meta property="og:site_name" content="{{ config('elevatis.name') }}">
    <meta property="og:title" content="{{ $fullTitle }}">
    <meta property="og:description" content="{{ $description }}">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:image" content="{{ $image }}">
    <meta name="twitter:card" content="summary_large_image">

    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('images/favicon-32.png') }}">
    <link rel="icon" type="image/png" sizes="192x192" href="{{ asset('images/favicon-192.png') }}">
    <link rel="apple-touch-icon" href="{{ asset('images/apple-touch-icon.png') }}">

    @fonts
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <script type="application/ld+json">
        {!! json_encode([
            '@context' => 'https://schema.org',
            '@type' => 'ProfessionalService',
            'name' => config('elevatis.name'),
            'slogan' => config('elevatis.tagline'),
            'description' => config('elevatis.description'),
            'url' => route('home'),
            'logo' => asset('images/elevatis-logo.png'),
            'image' => $image,
            'email' => $contact['email'],
            'telephone' => $contact['phone_href'],
            'address' => [
                '@type' => 'PostalAddress',
                'addressLocality' => $contact['city'],
                'addressCountry' => 'CM',
            ],
            'areaServed' => $contact['country'],
        ], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) !!}
    </script>
</head>
<body class="flex min-h-screen flex-col">
    <a href="#contenu" class="sr-only focus:not-sr-only focus:fixed focus:top-4 focus:left-4 focus:z-[60] focus:rounded-full focus:bg-brand focus:px-5 focus:py-3 focus:text-white">
        Aller au contenu
    </a>

    <x-site.header />

    <main id="contenu" class="flex-1">
        {{ $slot }}
    </main>

    <x-site.footer />

    <a href="https://wa.me/{{ $contact['whatsapp'] }}?text={{ rawurlencode($contact['whatsapp_message']) }}"
       target="_blank" rel="noopener"
       class="group fixed right-5 bottom-5 z-40 flex items-center gap-3 rounded-full bg-[#25D366] p-4 text-white shadow-lift transition hover:-translate-y-1 sm:right-8 sm:bottom-8"
       aria-label="Discuter avec Elevatis sur WhatsApp">
        <x-icon name="whatsapp" class="size-6" />
        <span class="hidden pr-1 text-sm font-semibold sm:group-hover:inline">Discutons sur WhatsApp</span>
    </a>
</body>
</html>
