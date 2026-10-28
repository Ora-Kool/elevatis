@props([
    'eyebrow',
    'title',
    'intro' => null,
    'image' => null,
    'imageAlt' => '',
])

<section class="relative overflow-hidden bg-cloud">
    <div aria-hidden="true" class="brand-mark pointer-events-none absolute -top-16 -right-20 size-[32rem] bg-brand/[0.05] lg:right-[8%]"></div>

    <div @class([
        'container-site relative grid items-center gap-12 py-16 sm:py-20 lg:py-24',
        'lg:grid-cols-2 lg:gap-16' => $image,
    ])>
        <div @class(['max-w-3xl', 'mx-auto text-center' => ! $image])>
            <nav aria-label="Fil d’Ariane" @class(['mb-8 text-sm', 'flex justify-center' => ! $image])>
                <ol class="flex items-center gap-2 text-slate-brand/70">
                    <li><a href="{{ route('home') }}" class="transition hover:text-brand">Accueil</a></li>
                    <li aria-hidden="true">/</li>
                    <li class="font-medium text-ink" aria-current="page">{{ $eyebrow }}</li>
                </ol>
            </nav>

            <p class="eyebrow animate-fade-up">{{ $eyebrow }}</p>
            <h1 class="mt-5 animate-fade-up text-4xl leading-[1.1] font-semibold [animation-delay:80ms] sm:text-5xl lg:text-6xl">
                {{ $title }}
            </h1>
            @if ($intro)
                <p class="mt-6 animate-fade-up text-lg leading-relaxed [animation-delay:160ms] sm:text-xl">{{ $intro }}</p>
            @endif

            @isset($actions)
                <div @class(['mt-10 flex animate-fade-up flex-wrap gap-4 [animation-delay:240ms]', 'justify-center' => ! $image])>
                    {{ $actions }}
                </div>
            @endisset
        </div>

        @if ($image)
            <div class="relative animate-fade-up [animation-delay:200ms]">
                <div class="absolute -inset-4 -z-0 rotate-2 rounded-[2.5rem] bg-mist"></div>
                <img src="{{ $image }}" alt="{{ $imageAlt }}" width="1024" height="680"
                     class="relative aspect-[4/3] w-full rounded-[2rem] object-cover shadow-lift">
            </div>
        @endif
    </div>
</section>
