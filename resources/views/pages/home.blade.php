<x-layouts.app>
    {{-- Hero --}}
    @php $slides = config('elevatis.hero_slides'); @endphp
    <section class="grain relative isolate flex h-[100svh] overflow-hidden bg-ink" data-hero data-hero-interval="6500">
        <div class="absolute inset-0 -z-20" aria-hidden="true">
            @foreach ($slides as $slide)
                <div data-hero-slide @class(['hero-slide', 'is-active' => $loop->first])>
                    <img src="{{ asset('images/'.$slide['image']) }}" alt="{{ $slide['alt'] }}"
                         width="1400" height="800"
                         @if ($loop->first) fetchpriority="high" @else loading="lazy" @endif
                         class="hero-slide-image {{ $slide['focus'] }}">
                </div>
            @endforeach
        </div>
        <div aria-hidden="true" class="hero-veil"></div>
        <div aria-hidden="true" class="absolute inset-0 -z-10 bg-gradient-to-b from-ink/50 via-ink/35 to-ink"></div>

        <div class="container-site relative z-10 flex h-full flex-col pt-28 pb-8 sm:pb-10 lg:pt-32 lg:pb-12">
            <div class="relative mt-auto w-full max-w-5xl">
                @foreach ($slides as $slide)
                    <div data-hero-copy @class(['hero-copy', 'is-active' => $loop->first])>
                        <p class="eyebrow text-mist!">
                            <span class="display text-base tracking-normal italic">{{ str_pad($loop->iteration, 2, '0', STR_PAD_LEFT) }}</span>
                            {{ $slide['kicker'] }}
                        </p>
                        @if ($loop->first)
                            <h1 class="display mt-5 text-4xl text-white italic sm:text-6xl lg:text-7xl">{{ $slide['title'] }}</h1>
                        @else
                            <p class="display mt-5 text-4xl text-white italic sm:text-6xl lg:text-7xl">{{ $slide['title'] }}</p>
                        @endif
                        <p class="mt-5 max-w-2xl text-base leading-relaxed text-white/75 sm:text-lg">{{ $slide['intro'] }}</p>
                        <div class="mt-8 flex flex-wrap gap-4">
                            <a href="{{ route($slide['cta_route'], $slide['cta_params']) }}" class="btn-light">
                                {{ $slide['cta_label'] }}
                                <x-icon name="arrow-right" class="size-4" />
                            </a>
                            <a href="{{ route('contact') }}" class="btn-ghost-light">Prendre rendez-vous</a>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="mt-8 flex items-center justify-between gap-4 border-t border-white/15 pt-6">
                <p class="hidden text-[11px] font-semibold tracking-[0.22em] text-white/50 uppercase sm:block">Glissez vers l’élévation</p>

                <div class="flex items-center gap-4">
                    <button type="button" data-hero-prev class="hero-nav-btn" aria-label="Image précédente">
                        <x-icon name="arrow-right" class="size-4 rotate-180" />
                    </button>
                    <div class="flex items-center gap-2" role="tablist" aria-label="Images du hero">
                        @foreach ($slides as $slide)
                            <button type="button" data-hero-dot role="tab"
                                    aria-label="{{ $slide['kicker'] }}"
                                    aria-selected="{{ $loop->first ? 'true' : 'false' }}"
                                    @class(['hero-dot', 'is-active' => $loop->first])>
                                <span class="hero-dot-progress"></span>
                            </button>
                        @endforeach
                    </div>
                    <button type="button" data-hero-next class="hero-nav-btn" aria-label="Image suivante">
                        <x-icon name="arrow-right" class="size-4" />
                    </button>
                </div>
            </div>
        </div>
    </section>

    {{-- Marquee --}}
    <div class="overflow-hidden border-y border-ink/5 bg-white py-5" aria-hidden="true">
        <div class="marquee-track flex w-max items-center gap-10 pr-10 text-[11px] font-semibold tracking-[0.28em] text-brand uppercase">
            @foreach (array_merge(range(1, 2), []) as $pass)
                @foreach (['Coaching de vie', 'Formation', 'Écoute active', 'Leadership', 'Développement personnel', 'Bien-être', 'Prenez de la hauteur', 'Sens'] as $word)
                    <span class="flex items-center gap-10">
                        <span>{{ $word }}</span>
                        <span class="size-1.5 rounded-full bg-brand/40"></span>
                    </span>
                @endforeach
            @endforeach
        </div>
    </div>

    {{-- Manifesto --}}
    <section class="section bg-white">
        <div class="container-site grid items-center gap-16 lg:grid-cols-12 lg:gap-20">
            <div class="lg:col-span-6" data-reveal>
                <p class="eyebrow">Votre partenaire</p>
                <h2 class="display mt-5 text-4xl italic sm:text-5xl lg:text-6xl">Pour une vie épanouissante et significative</h2>
                <p class="mt-8 text-lg leading-relaxed">
                    Elevatis n’est pas un catalogue de séances. C’est un espace où l’on apprend à se voir clairement,
                    à reprendre le pouvoir intérieur, puis à agir — avec discipline et avec sens.
                </p>
                <p class="mt-5 leading-relaxed">
                    Un accompagnement sur mesure, un environnement de confiance, un changement qui tient dans le temps :
                    nous encourageons l’autonomie et la responsabilisation.
                </p>
                <a href="{{ route('about') }}" class="btn-primary mt-10">
                    Notre approche
                    <x-icon name="arrow-right" class="size-4" />
                </a>
            </div>

            <div class="relative lg:col-span-6" data-reveal style="--reveal-delay: 120ms">
                <p class="display absolute -top-6 -left-2 z-10 text-[7rem] leading-none text-brand/10 italic lg:-left-10 lg:text-[9rem]">01</p>
                <img src="{{ asset('images/elevatis-sommet.jpg') }}" alt="Prendre de la hauteur avec Elevatis"
                     width="1400" height="800" class="relative aspect-[4/5] w-full object-cover object-[center_40%] sm:aspect-[4/3]">
                <div class="absolute right-0 -bottom-8 max-w-[16rem] bg-brand p-6 text-white sm:-right-4">
                    <p class="display text-4xl italic">9 800+</p>
                    <p class="mt-2 text-sm text-white/75">Séances de coaching de vie</p>
                </div>
            </div>
        </div>
    </section>

    {{-- Services cinema --}}
    <section class="section bg-cloud">
        <div class="container-site">
            <div class="flex flex-col justify-between gap-8 lg:flex-row lg:items-end">
                <x-section-heading align="left" eyebrow="Nos services" title="Trois chemins pour prendre de la hauteur" class="mx-0!" />
                <a href="{{ route('services') }}" class="btn-secondary shrink-0" data-reveal>
                    Tous nos services
                    <x-icon name="arrow-right" class="size-4" />
                </a>
            </div>

            <div class="mt-16 divide-y divide-ink/10 border-y border-ink/10">
                @foreach ([
                    ['id' => 'coaching', 'n' => '01', 'title' => 'Coaching de vie', 'text' => 'Libérez votre potentiel en travaillant avec un coach de vie pour identifier vos objectifs et surmonter les obstacles personnels.', 'image' => 'elevatis-seance-coaching.jpg'],
                    ['id' => 'formation', 'n' => '02', 'title' => 'Formation', 'text' => 'Transformez votre vie en explorant vos aspirations profondes et en atteignant vos objectifs personnels grâce à vos compétences.', 'image' => 'elevatis-formation.jpg'],
                    ['id' => 'ecoute', 'n' => '03', 'title' => 'Écoute active', 'text' => 'Développez des relations authentiques en maîtrisant l’art de l’écoute et en comprenant véritablement vos interlocuteurs.', 'image' => 'elevatis-ecoute.jpg'],
                ] as $service)
                    <a href="{{ route('services') }}#{{ $service['id'] }}"
                       class="group grid items-center gap-8 py-10 lg:grid-cols-12 lg:gap-12 lg:py-14"
                       data-reveal>
                        <span class="display text-4xl text-brand/30 italic lg:col-span-1">{{ $service['n'] }}</span>
                        <div class="overflow-hidden lg:col-span-4">
                            <img src="{{ asset('images/'.$service['image']) }}" alt="" loading="lazy"
                                 class="aspect-[16/10] w-full object-cover transition duration-700 group-hover:scale-[1.04]">
                        </div>
                        <div class="lg:col-span-7">
                            <h3 class="display text-3xl italic sm:text-4xl">{{ $service['title'] }}</h3>
                            <p class="mt-4 max-w-xl leading-relaxed">{{ $service['text'] }}</p>
                            <span class="mt-6 inline-flex items-center gap-2 text-sm font-semibold text-brand">
                                En savoir plus
                                <x-icon name="arrow-right" class="size-4 transition group-hover:translate-x-1" />
                            </span>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </section>

    {{-- Four pillars --}}
    <section class="section bg-white">
        <div class="container-site">
            <x-section-heading eyebrow="Les piliers de l’élévation" title="Conscience, responsabilité, discipline, sens"
                               intro="Inspirés de notre guide « Reprendre le pouvoir sur sa vie », ces quatre piliers structurent chaque accompagnement." />

            <ol class="mt-20 grid gap-px bg-ink/8 sm:grid-cols-2 lg:grid-cols-4">
                @foreach ([
                    ['title' => 'Conscience', 'text' => 'Voir clairement où vous en êtes — sans déni, sans dramatiser.'],
                    ['title' => 'Responsabilité', 'text' => 'Reprendre le pouvoir intérieur : ce que vous pouvez décider, aujourd’hui.'],
                    ['title' => 'Discipline', 'text' => 'Passer à l’action alignée, une décision à la fois, jusqu’à ce que ça tienne.'],
                    ['title' => 'Sens', 'text' => 'Ancrer le changement dans ce qui compte vraiment pour vous.'],
                ] as $pillar)
                    <li class="bg-white p-8 sm:p-10" data-reveal style="--reveal-delay: {{ $loop->index * 80 }}ms">
                        <span class="display text-5xl text-brand/20 italic">{{ str_pad($loop->iteration, 2, '0', STR_PAD_LEFT) }}</span>
                        <h3 class="display mt-8 text-3xl italic">{{ $pillar['title'] }}</h3>
                        <p class="mt-4 leading-relaxed">{{ $pillar['text'] }}</p>
                    </li>
                @endforeach
            </ol>
        </div>
    </section>

    {{-- Impact --}}
    <section class="grain relative overflow-hidden bg-ink py-24 text-white lg:py-32">
        <div class="container-site relative">
            <div class="flex flex-col justify-between gap-10 lg:flex-row lg:items-end">
                <x-section-heading align="left" light eyebrow="Des résultats concrets" title="Mesurer l’impact"
                                   intro="Découvrez comment Elevatis transforme des vies et réalise des aspirations profondes." />
                <a href="{{ route('testimonials') }}" class="btn-light shrink-0" data-reveal>
                    Lire les témoignages
                    <x-icon name="arrow-right" class="size-4" />
                </a>
            </div>

            <dl class="mt-16 grid grid-cols-2 gap-10 border-t border-white/15 pt-14 lg:grid-cols-4 lg:gap-8">
                @foreach (config('elevatis.stats') as $stat)
                    <div data-reveal style="--reveal-delay: {{ $loop->index * 90 }}ms">
                        <dd class="display text-5xl text-white italic sm:text-6xl lg:text-7xl"
                            data-counter="{{ $stat['value'] }}" data-suffix="{{ $stat['suffix'] === '%' ? ' %' : $stat['suffix'] }}">
                            {{ number_format($stat['value'], 0, ',', ' ') }}{{ $stat['suffix'] === '%' ? ' %' : $stat['suffix'] }}
                        </dd>
                        <dt class="mt-4 max-w-[12rem] text-sm leading-snug text-white/60">{{ $stat['label'] }}</dt>
                    </div>
                @endforeach
            </dl>
        </div>
    </section>

    <x-guide />

    {{-- Témoignages --}}
    <section class="section bg-white">
        <div class="container-site">
            <x-section-heading eyebrow="Témoignages" title="Ce qu’ils disent d’Elevatis"
                               intro="Découvrez ce que nos clients satisfaits ont à dire sur leur expérience avec Elevatis." />

            <div class="mt-16 grid gap-6 md:grid-cols-2 lg:grid-cols-3">
                @foreach (config('elevatis.testimonials') as $testimonial)
                    <x-testimonial-card :testimonial="$testimonial" data-reveal style="--reveal-delay: {{ $loop->index * 100 }}ms" />
                @endforeach
            </div>
        </div>
    </section>

    <x-newsletter class="pt-0!" />

    <x-cta-band />
</x-layouts.app>
