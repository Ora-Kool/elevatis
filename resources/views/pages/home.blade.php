<x-layouts.app>
    {{-- Hero --}}
    <section class="relative overflow-hidden bg-cloud">
        <div aria-hidden="true" class="brand-mark pointer-events-none absolute -top-24 -left-32 size-[36rem] bg-brand/[0.05]"></div>

        <div class="container-site relative grid items-center gap-14 py-16 sm:py-20 lg:grid-cols-12 lg:gap-10 lg:py-28">
            <div class="lg:col-span-6">
                <p class="eyebrow animate-fade-up">Coach personnel · {{ config('elevatis.contact.city') }}</p>
                <h1 class="mt-6 animate-fade-up text-[2.6rem] leading-[1.05] font-semibold [animation-delay:80ms] sm:text-6xl lg:text-[4.25rem]">
                    Découvrez votre potentiel avec <span class="text-brand">Elevatis</span>
                </h1>
                <p class="mt-7 max-w-xl animate-fade-up text-lg leading-relaxed [animation-delay:160ms] sm:text-xl">
                    Offrez-vous une vie épanouissante et pleine de sens grâce à nos services de coaching personnalisé.
                </p>
                <div class="mt-10 flex animate-fade-up flex-wrap gap-4 [animation-delay:240ms]">
                    <a href="{{ route('services') }}" class="btn-primary">
                        Découvrir nos services
                        <x-icon name="arrow-right" class="size-4" />
                    </a>
                    <a href="{{ route('contact') }}" class="btn-secondary">Prendre rendez-vous</a>
                </div>

                <dl class="mt-14 grid max-w-lg animate-fade-up grid-cols-2 gap-8 border-t border-ink/10 pt-8 [animation-delay:320ms]">
                    <div>
                        <dt class="text-sm">Séances de coaching</dt>
                        <dd class="mt-1 text-3xl font-semibold text-ink">9 800+</dd>
                    </div>
                    <div>
                        <dt class="text-sm">Clients satisfaits</dt>
                        <dd class="mt-1 text-3xl font-semibold text-ink">96 %</dd>
                    </div>
                </dl>
            </div>

            <div class="relative lg:col-span-6">
                <div class="relative animate-fade-up [animation-delay:200ms]">
                    <div aria-hidden="true" class="absolute -inset-3 rotate-3 rounded-[2.75rem] bg-mist sm:-inset-5"></div>
                    <img src="{{ asset('images/elevatis-seance-coaching.jpg') }}"
                         alt="Séance de coaching personnalisé avec Elevatis" width="1024" height="678" fetchpriority="high"
                         class="relative aspect-[5/4] w-full rounded-[2.25rem] object-cover shadow-lift">

                    <div class="absolute -bottom-8 left-4 flex items-center gap-4 rounded-2xl bg-white p-4 pr-6 shadow-lift sm:-left-8">
                        <span class="flex size-12 items-center justify-center rounded-xl bg-brand text-white">
                            <x-icon name="heart" class="size-6" />
                        </span>
                        <span>
                            <span class="block text-sm">Écoute active</span>
                            <span class="block font-semibold text-ink">Un espace de confiance</span>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Partenaire --}}
    <section class="section">
        <div class="container-site">
            <x-section-heading eyebrow="Votre partenaire" title="Pour une vie épanouissante et significative" />

            <div class="mt-16 grid gap-6 md:grid-cols-3">
                @foreach ([
                    ['icon' => 'user', 'title' => 'Accompagnement personnalisé', 'text' => 'Un accompagnement sur mesure pour réaliser votre plein potentiel.'],
                    ['icon' => 'shield-check', 'title' => 'Un environnement de confiance', 'text' => 'Un espace sécurisé pour explorer vos aspirations profondes.'],
                    ['icon' => 'trending-up', 'title' => 'Un changement durable', 'text' => 'Nous encourageons l’autonomie et la responsabilisation pour des résultats qui durent.'],
                ] as $pillar)
                    <div class="card group hover:-translate-y-1 hover:shadow-lift" data-reveal style="--reveal-delay: {{ $loop->index * 100 }}ms">
                        <span class="flex size-14 items-center justify-center rounded-2xl bg-cloud text-brand transition group-hover:bg-brand group-hover:text-white">
                            <x-icon :name="$pillar['icon']" class="size-7" />
                        </span>
                        <h3 class="mt-6 text-xl font-semibold">{{ $pillar['title'] }}</h3>
                        <p class="mt-3 leading-relaxed">{{ $pillar['text'] }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- Services --}}
    <section class="section bg-cloud">
        <div class="container-site">
            <div class="flex flex-col justify-between gap-8 lg:flex-row lg:items-end">
                <x-section-heading align="left" eyebrow="Nos services" title="Nos principaux services à valeur ajoutée" class="mx-0!" />
                <a href="{{ route('services') }}" class="btn-secondary shrink-0" data-reveal>
                    Tous nos services
                    <x-icon name="arrow-right" class="size-4" />
                </a>
            </div>

            <div class="mt-14 grid gap-6 lg:grid-cols-3">
                @foreach ([
                    ['id' => 'coaching', 'icon' => 'sparkles', 'image' => 'elevatis-seance.jpg', 'title' => 'Coaching de vie', 'text' => 'Libérez votre potentiel en travaillant avec un coach de vie pour identifier vos objectifs et surmonter les obstacles personnels.'],
                    ['id' => 'formation', 'icon' => 'academic-cap', 'image' => 'elevatis-formation.jpg', 'title' => 'Formation', 'text' => 'Transformez votre vie en explorant vos aspirations profondes et en atteignant vos objectifs personnels grâce à vos compétences.'],
                    ['id' => 'ecoute', 'icon' => 'chat', 'image' => 'elevatis-ecoute.jpg', 'title' => 'Écoute active', 'text' => 'Développez des relations authentiques en maîtrisant l’art de l’écoute et en comprenant véritablement vos interlocuteurs.'],
                ] as $service)
                    <a href="{{ route('services') }}#{{ $service['id'] }}"
                       class="group flex flex-col overflow-hidden rounded-3xl bg-white shadow-soft transition duration-500 hover:-translate-y-1 hover:shadow-lift"
                       data-reveal style="--reveal-delay: {{ $loop->index * 100 }}ms">
                        <div class="relative aspect-[16/10] overflow-hidden">
                            <img src="{{ asset('images/'.$service['image']) }}" alt="" loading="lazy"
                                 class="size-full object-cover transition duration-700 group-hover:scale-105">
                            <span class="absolute bottom-4 left-4 flex size-12 items-center justify-center rounded-xl bg-white text-brand shadow-soft">
                                <x-icon :name="$service['icon']" class="size-6" />
                            </span>
                        </div>
                        <div class="flex flex-1 flex-col p-8">
                            <h3 class="text-2xl font-semibold">{{ $service['title'] }}</h3>
                            <p class="mt-3 flex-1 leading-relaxed">{{ $service['text'] }}</p>
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

    {{-- Impact --}}
    <section class="section">
        <div class="container-site grid items-center gap-16 lg:grid-cols-2">
            <div>
                <x-section-heading align="left" eyebrow="Des résultats concrets" title="Mesurer l’impact"
                                   intro="Découvrez comment Elevatis transforme des vies et réalise des aspirations profondes." />
                <div class="mt-10 flex flex-wrap gap-4" data-reveal>
                    <a href="{{ route('testimonials') }}" class="btn-primary">
                        Lire les témoignages
                        <x-icon name="arrow-right" class="size-4" />
                    </a>
                </div>
            </div>

            <dl class="grid grid-cols-2 gap-5">
                @foreach (config('elevatis.stats') as $stat)
                    <div @class([
                        'rounded-3xl p-8',
                        'bg-brand text-white' => $loop->first,
                        'bg-cloud' => ! $loop->first,
                    ]) data-reveal style="--reveal-delay: {{ $loop->index * 100 }}ms">
                        <dd @class(['text-4xl font-semibold tracking-tight sm:text-5xl', 'text-ink' => ! $loop->first])
                            data-counter="{{ $stat['value'] }}" data-suffix="{{ $stat['suffix'] === '%' ? ' %' : $stat['suffix'] }}">
                            {{ number_format($stat['value'], 0, ',', ' ') }}{{ $stat['suffix'] === '%' ? ' %' : $stat['suffix'] }}
                        </dd>
                        <dt @class(['mt-3 text-sm leading-snug', 'text-white/80' => $loop->first])>{{ $stat['label'] }}</dt>
                    </div>
                @endforeach
            </dl>
        </div>
    </section>

    {{-- Guide gratuit --}}
    <x-guide />

    {{-- Témoignages --}}
    <section class="section">
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
