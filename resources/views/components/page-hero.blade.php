@props([
    'eyebrow',
    'title',
    'intro' => null,
    'image' => asset('images/elevatis-sommet.jpg'),
    'imageAlt' => '',
])

<section class="grain relative isolate overflow-x-clip bg-ink">
    <img src="{{ $image }}" alt="{{ $imageAlt }}" width="1400" height="800" data-parallax="0.08"
         class="absolute inset-0 -z-20 size-full scale-110 object-cover object-center">
    <div aria-hidden="true" class="absolute inset-0 -z-10 bg-gradient-to-b from-ink/70 via-ink/55 to-ink"></div>

    <div class="container-site relative flex min-h-[85svh] flex-col pt-28 pb-16 lg:pt-32 lg:pb-20">
        <nav aria-label="Fil d’Ariane" class="text-sm text-white/55">
            <ol class="flex items-center gap-2">
                <li><a href="{{ route('home') }}" class="transition hover:text-white">Accueil</a></li>
                <li aria-hidden="true">/</li>
                <li class="text-white" aria-current="page">{{ $eyebrow }}</li>
            </ol>
        </nav>

        <div class="mt-auto max-w-5xl pt-16">
            <p class="eyebrow text-mist!">{{ $eyebrow }}</p>
            <h1 class="display mt-5 text-4xl text-white italic sm:text-6xl lg:text-7xl">
                {{ $title }}
            </h1>
            @if ($intro)
                <p class="mt-6 max-w-2xl text-lg leading-relaxed text-white/75 sm:text-xl">{{ $intro }}</p>
            @endif

            @isset($actions)
                <div class="mt-10 flex flex-wrap gap-4">
                    {{ $actions }}
                </div>
            @endisset
        </div>
    </div>
</section>
