@php
    $guide = config('elevatis.guide');
@endphp

<section class="section bg-ink text-white/75">
    <div class="container-site grid items-center gap-14 lg:grid-cols-2 lg:gap-20">
        <div class="relative mx-auto w-full max-w-sm" data-reveal>
            <div aria-hidden="true" class="absolute inset-0 translate-x-5 translate-y-5 rounded-3xl bg-brand"></div>
            <div class="relative flex aspect-[3/4] flex-col justify-between overflow-hidden rounded-3xl bg-white p-9 shadow-lift">
                <div aria-hidden="true" class="brand-mark absolute -right-14 -bottom-10 size-72 bg-brand/10"></div>
                <img src="{{ asset('images/elevatis-logo.png') }}" alt="Elevatis" width="364" height="200" class="relative h-14 w-auto self-start" loading="lazy">
                <div class="relative">
                    <p class="text-xs font-semibold tracking-[0.2em] text-brand uppercase">Guide gratuit</p>
                    <p class="mt-3 text-3xl leading-tight font-semibold text-ink">{{ $guide['title'] }}</p>
                    <p class="mt-4 text-sm leading-relaxed text-slate-brand">{{ $guide['subtitle'] }}</p>
                </div>
            </div>
        </div>

        <div data-reveal style="--reveal-delay: 120ms">
            <p class="eyebrow text-mist!">Ressource offerte</p>
            <h2 class="mt-4 text-3xl leading-tight font-semibold text-white! sm:text-4xl lg:text-[2.75rem]">
                Téléchargez gratuitement «&nbsp;{{ $guide['title'] }}&nbsp;»
            </h2>
            <p class="mt-6 text-lg leading-relaxed">
                {{ $guide['subtitle'] }} {{ $guide['pages'] }} pages d’exercices pratiques pour amorcer votre propre chemin d’élévation personnelle.
            </p>

            <ul class="mt-8 grid gap-3 sm:grid-cols-2">
                @foreach ($guide['chapters'] as $chapter)
                    <li class="flex items-start gap-3">
                        <span class="mt-0.5 flex size-6 shrink-0 items-center justify-center rounded-full bg-brand text-xs font-semibold text-white">{{ $loop->iteration }}</span>
                        <span class="text-white">{{ $chapter }}</span>
                    </li>
                @endforeach
            </ul>

            <a href="{{ asset($guide['file']) }}" download class="btn-light mt-10">
                <x-icon name="download" class="size-4" />
                Télécharger le guide (PDF)
            </a>
        </div>
    </div>
</section>
