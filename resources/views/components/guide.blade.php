@php
    $guide = config('elevatis.guide');
@endphp

<section class="relative overflow-hidden bg-brand-dark py-24 text-white/75 lg:py-32">
    <div aria-hidden="true" class="brand-mark pointer-events-none absolute top-1/2 -left-24 size-[28rem] -translate-y-1/2 bg-white/[0.05]"></div>

    <div class="container-site relative grid items-center gap-16 lg:grid-cols-12">
        <div class="relative mx-auto w-full max-w-sm lg:col-span-5" data-reveal>
            <div aria-hidden="true" class="absolute inset-0 translate-x-4 translate-y-6 bg-brand"></div>
            <div class="relative flex aspect-[3/4] flex-col justify-between overflow-hidden bg-cloud p-9">
                <div aria-hidden="true" class="brand-mark absolute -right-14 -bottom-10 size-72 bg-brand/15"></div>
                <img src="{{ asset('images/elevatis-logo.png') }}" alt="Elevatis" width="364" height="200" class="relative h-14 w-auto self-start" loading="lazy">
                <div class="relative">
                    <p class="text-[11px] font-semibold tracking-[0.28em] text-brand uppercase">Guide gratuit</p>
                    <p class="display mt-4 text-4xl leading-[0.95] text-ink italic">{{ $guide['title'] }}</p>
                    <p class="mt-4 text-sm leading-relaxed text-slate-brand">{{ $guide['subtitle'] }}</p>
                </div>
            </div>
        </div>

        <div class="lg:col-span-7" data-reveal style="--reveal-delay: 120ms">
            <p class="eyebrow text-mist!">Ressource offerte</p>
            <h2 class="display mt-5 text-4xl text-white italic sm:text-5xl lg:text-6xl">
                Téléchargez gratuitement «&nbsp;{{ $guide['title'] }}&nbsp;»
            </h2>
            <p class="mt-6 max-w-xl text-lg leading-relaxed">
                {{ $guide['subtitle'] }} {{ $guide['pages'] }} pages d’exercices pour passer de la lucidité à l’action alignée.
            </p>

            <ol class="mt-10 grid gap-4 sm:grid-cols-2">
                @foreach ($guide['chapters'] as $chapter)
                    <li class="flex items-start gap-4 border-t border-white/15 pt-4">
                        <span class="font-display text-2xl leading-none text-mist italic">{{ str_pad($loop->iteration, 2, '0', STR_PAD_LEFT) }}</span>
                        <span class="text-white">{{ $chapter }}</span>
                    </li>
                @endforeach
            </ol>

            <a href="{{ asset($guide['file']) }}" download class="btn-light mt-10">
                <x-icon name="download" class="size-4" />
                Télécharger le guide (PDF)
            </a>
        </div>
    </div>
</section>
