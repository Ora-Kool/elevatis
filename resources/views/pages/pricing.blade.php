<x-layouts.app
    title="Tarifs"
    description="Découvrez les formules de coaching de vie Elevatis : le Plan Essentiel pour un accompagnement régulier, le Plan Avancé pour une transformation profonde.">

    <x-page-hero
        eyebrow="Tarifs"
        title="Choisissez votre plan"
        intro="Découvrez nos offres de coaching de vie personnalisé et choisissez celle qui correspond le mieux à vos besoins." />

    <section class="section bg-white">
        <div class="container-site">
            <div class="mx-auto grid max-w-5xl gap-px bg-ink/8 md:grid-cols-2">
                @foreach (config('elevatis.plans') as $plan)
                    <div @class([
                        'relative flex flex-col p-10 sm:p-12',
                        'bg-brand-dark text-white/75' => $plan['featured'],
                        'bg-cloud' => ! $plan['featured'],
                    ]) data-reveal style="--reveal-delay: {{ $loop->index * 120 }}ms">
                        @if ($plan['featured'])
                            <span class="mb-6 inline-flex self-start text-[11px] font-semibold tracking-[0.22em] text-mist uppercase">
                                Transformation profonde
                            </span>
                        @endif

                        <h2 @class(['display text-4xl italic', 'text-white!' => $plan['featured']])>{{ $plan['name'] }}</h2>
                        <p class="mt-3">{{ $plan['summary'] }}</p>

                        <p class="mt-10 flex items-baseline gap-1 border-b pb-8 {{ $plan['featured'] ? 'border-white/15' : 'border-ink/10' }}">
                            <span @class(['display text-5xl italic', 'text-white' => $plan['featured'], 'text-ink' => ! $plan['featured']])>{{ $plan['price'] }}</span>
                            @if ($plan['period'])
                                <span class="text-lg">{{ $plan['period'] }}</span>
                            @endif
                        </p>

                        <ul class="mt-8 flex-1 space-y-4">
                            @foreach ($plan['features'] as $feature)
                                <li class="flex items-center gap-3">
                                    <span @class([
                                        'flex size-6 shrink-0 items-center justify-center rounded-full',
                                        'bg-white/10 text-white' => $plan['featured'],
                                        'bg-brand/10 text-brand' => ! $plan['featured'],
                                    ])>
                                        <x-icon name="check" class="size-3.5" />
                                    </span>
                                    <span @class(['text-white' => $plan['featured'], 'text-ink' => ! $plan['featured']])>{{ $feature }}</span>
                                </li>
                            @endforeach
                        </ul>

                        <a href="{{ route('contact', ['sujet' => $plan['slug']]) }}"
                           class="{{ $plan['featured'] ? 'btn-light' : 'btn-primary' }} mt-10 w-full">
                            {{ $plan['cta'] }}
                            <x-icon name="arrow-right" class="size-4" />
                        </a>
                    </div>
                @endforeach
            </div>

            <p class="mx-auto mt-10 max-w-2xl text-center text-sm" data-reveal>
                Vous hésitez entre deux formules ? <a href="{{ route('contact') }}" class="font-semibold text-brand underline-offset-4 hover:underline">Contactez-nous</a>
                et nous vous aiderons à choisir l’accompagnement le plus adapté.
            </p>
        </div>
    </section>

    <section class="section bg-cloud">
        <div class="container-site grid items-center gap-16 lg:grid-cols-2">
            <div class="relative order-2 lg:order-1" data-reveal>
                <img src="{{ asset('images/elevatis-ecoute.jpg') }}" alt="Séance d’accompagnement personnalisé" loading="lazy"
                     class="aspect-[4/5] w-full max-w-md object-cover lg:mx-auto">
            </div>

            <div class="order-1 lg:order-2">
                <x-section-heading align="left" eyebrow="Détails de l’accompagnement" title="Ce que votre accompagnement personnalisé vous apporte"
                                   intro="Découvrez en quoi notre accompagnement personnalisé peut vous aider à réaliser votre plein potentiel." />

                <div class="mt-10 grid gap-8 sm:grid-cols-2">
                    @foreach ([
                        ['title' => 'Approche holistique', 'text' => 'Notre approche prend en compte tous les aspects de votre vie pour un développement complet.'],
                        ['title' => 'Méthodes éprouvées', 'text' => 'Nous utilisons des méthodes éprouvées pour vous accompagner efficacement dans votre évolution.'],
                        ['title' => 'Confiance et soutien', 'text' => 'Un environnement de confiance pour vous exprimer librement et atteindre vos objectifs en toute sécurité.'],
                        ['title' => 'Exploration profonde', 'text' => 'Explorez vos aspirations profondes et découvrez un nouveau potentiel pour une vie épanouissante.'],
                    ] as $detail)
                        <div data-reveal style="--reveal-delay: {{ $loop->index * 80 }}ms">
                            <span class="display text-2xl text-brand/30 italic">{{ str_pad($loop->iteration, 2, '0', STR_PAD_LEFT) }}</span>
                            <h3 class="mt-3 text-lg font-semibold">{{ $detail['title'] }}</h3>
                            <p class="mt-2 leading-relaxed">{{ $detail['text'] }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <section class="section bg-white">
        <div class="container-site">
            <x-section-heading eyebrow="Témoignages" title="Ce qu’ils disent d’Elevatis" />
            <div class="mx-auto mt-16 grid max-w-5xl gap-6 md:grid-cols-2">
                @foreach (array_slice(config('elevatis.testimonials'), 0, 2) as $testimonial)
                    <x-testimonial-card :testimonial="$testimonial" data-reveal style="--reveal-delay: {{ $loop->index * 100 }}ms" />
                @endforeach
            </div>
        </div>
    </section>

    <x-cta-band />
</x-layouts.app>
