<x-layouts.app
    title="Services"
    description="Coaching de vie, accompagnement personnel et formation : découvrez les services Elevatis pour révéler votre plein potentiel et vivre une vie épanouie.">

    <x-page-hero
        eyebrow="Services"
        title="Votre partenaire pour une vie épanouissante et significative"
        intro="Coaching de vie, accompagnement personnel et formation : nous vous accompagnons vers la découverte de votre plein potentiel." />

    {{-- Engagements --}}
    <section class="border-b border-ink/5">
        <div class="container-site grid gap-px overflow-hidden py-0 sm:grid-cols-2 lg:grid-cols-4">
            @foreach ([
                ['icon' => 'star', 'text' => 'Plus de 9 800 séances et des clients transformés'],
                ['icon' => 'trending-up', 'text' => 'Des résultats concrets et durables pour nos clients'],
                ['icon' => 'users', 'text' => 'Une équipe dévouée et passionnée pour vous accompagner'],
                ['icon' => 'globe', 'text' => 'Reconnue pour son approche holistique et personnalisée'],
            ] as $item)
                <div class="flex items-center gap-4 py-8 sm:px-6 lg:first:pl-0" data-reveal style="--reveal-delay: {{ $loop->index * 80 }}ms">
                    <span class="flex size-11 shrink-0 items-center justify-center rounded-full bg-cloud text-brand">
                        <x-icon :name="$item['icon']" />
                    </span>
                    <p class="text-sm leading-snug font-medium text-ink">{{ $item['text'] }}</p>
                </div>
            @endforeach
        </div>
    </section>

    {{-- Services détaillés --}}
    <section class="section">
        <div class="container-site">
            <x-section-heading eyebrow="Découvrez" title="Une approche holistique pour révéler vos aspirations profondes" />

            <div class="mt-20 space-y-24 lg:space-y-32">
                @foreach ([
                    [
                        'id' => 'coaching',
                        'icon' => 'sparkles',
                        'label' => 'Coaching de vie',
                        'title' => 'Accompagnement personnalisé pour une vie épanouissante',
                        'text' => 'Découvrez votre potentiel et atteignez vos objectifs avec notre coaching. Ensemble, nous identifions vos objectifs, levons les obstacles personnels et construisons un plan d’action qui vous ressemble.',
                        'points' => ['Identification de vos objectifs', 'Dépassement des blocages personnels', 'Soutien individualisé à chaque étape'],
                        'image' => 'elevatis-seance-coaching.jpg',
                        'alt' => 'Coach Elevatis en séance individuelle',
                    ],
                    [
                        'id' => 'formation',
                        'icon' => 'academic-cap',
                        'label' => 'Formation',
                        'title' => 'Développement personnel grâce à nos formations spécialisées',
                        'text' => 'Acquérez les compétences nécessaires à votre épanouissement personnel et à votre évolution professionnelle, à travers des programmes de formation sur mesure.',
                        'points' => ['Programmes adaptés à vos besoins', 'Compétences personnelles et professionnelles', 'Autonomie et responsabilisation'],
                        'image' => 'elevatis-formation.jpg',
                        'alt' => 'Formation animée par Elevatis',
                    ],
                    [
                        'id' => 'ecoute',
                        'icon' => 'chat',
                        'label' => 'Écoute active',
                        'title' => 'Écoute active pour une compréhension profonde de vos besoins',
                        'text' => 'Nous vous écoutons attentivement pour mieux vous accompagner vers la réussite. Un espace où vous exprimer librement, et où apprendre à développer des relations authentiques.',
                        'points' => ['Un espace pour vous exprimer librement', 'Un cadre bienveillant et confidentiel', 'L’art de l’écoute au service de vos relations'],
                        'image' => 'elevatis-ecoute.jpg',
                        'alt' => 'Échange en toute confiance lors d’une séance d’écoute',
                    ],
                ] as $service)
                    <article id="{{ $service['id'] }}" class="grid scroll-mt-32 items-center gap-12 lg:grid-cols-2 lg:gap-20">
                        <div @class(['relative', 'lg:order-2' => $loop->odd]) data-reveal>
                            <div aria-hidden="true" @class([
                                'absolute -inset-4 rounded-[2.5rem] bg-cloud',
                                '-rotate-2' => $loop->even,
                                'rotate-2' => $loop->odd,
                            ])></div>
                            <img src="{{ asset('images/'.$service['image']) }}" alt="{{ $service['alt'] }}" loading="lazy"
                                 class="relative aspect-[4/3] w-full rounded-[2rem] object-cover shadow-lift">
                        </div>

                        <div data-reveal style="--reveal-delay: 120ms">
                            <span class="inline-flex items-center gap-3 rounded-full bg-cloud py-2 pr-5 pl-2 text-sm font-semibold text-brand">
                                <span class="flex size-8 items-center justify-center rounded-full bg-brand text-white">
                                    <x-icon :name="$service['icon']" class="size-4" />
                                </span>
                                {{ $service['label'] }}
                            </span>
                            <h3 class="mt-6 text-3xl leading-tight font-semibold sm:text-4xl">{{ $service['title'] }}</h3>
                            <p class="mt-5 text-lg leading-relaxed">{{ $service['text'] }}</p>
                            <ul class="mt-8 space-y-3">
                                @foreach ($service['points'] as $point)
                                    <li class="flex items-center gap-3 text-ink">
                                        <span class="flex size-6 items-center justify-center rounded-full bg-brand/10 text-brand">
                                            <x-icon name="check" class="size-3.5" />
                                        </span>
                                        {{ $point }}
                                    </li>
                                @endforeach
                            </ul>
                            <a href="{{ route('contact', ['sujet' => $service['id']]) }}" class="btn-primary mt-10">
                                Demander un accompagnement
                                <x-icon name="arrow-right" class="size-4" />
                            </a>
                        </div>
                    </article>
                @endforeach
            </div>
        </div>
    </section>

    {{-- Domaines --}}
    <section id="domaines" class="section scroll-mt-24 bg-cloud">
        <div class="container-site">
            <x-section-heading eyebrow="Nos principaux domaines" title="Des méthodes éprouvées pour chaque dimension de votre vie"
                               intro="Explorez nos domaines d’intervention pour vous accompagner vers la réalisation de votre plein potentiel." />

            <div class="mt-16 grid gap-6 sm:grid-cols-2">
                @foreach ([
                    ['icon' => 'sparkles', 'title' => 'Développement personnel', 'text' => 'Notre approche holistique aide les individus à se découvrir, à définir leurs objectifs et à les atteindre pour une vie épanouissante.'],
                    ['icon' => 'briefcase', 'title' => 'Leadership et management', 'text' => 'Nous accompagnons les professionnels à développer leurs compétences de leadership et de gestion pour atteindre leurs objectifs avec excellence.'],
                    ['icon' => 'heart', 'title' => 'Bien-être et santé', 'text' => 'Par un accompagnement personnalisé, nous créons un environnement de confiance pour explorer vos aspirations profondes et atteindre une vie épanouissante.'],
                    ['icon' => 'book-open', 'title' => 'Éducation et formation', 'text' => 'En favorisant l’autonomie et la responsabilisation, nous aidons chacun à réaliser son plein potentiel à travers des programmes de formation sur mesure.'],
                ] as $domain)
                    <div class="card group flex gap-6 hover:-translate-y-1 hover:shadow-lift" data-reveal style="--reveal-delay: {{ $loop->index * 80 }}ms">
                        <span class="flex size-14 shrink-0 items-center justify-center rounded-2xl bg-cloud text-brand transition group-hover:bg-brand group-hover:text-white">
                            <x-icon :name="$domain['icon']" class="size-7" />
                        </span>
                        <div>
                            <h3 class="text-xl font-semibold">{{ $domain['title'] }}</h3>
                            <p class="mt-3 leading-relaxed">{{ $domain['text'] }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- Parcours --}}
    <section class="section">
        <div class="container-site">
            <x-section-heading eyebrow="Comment commencer" title="Votre parcours pour prendre de la hauteur"
                               intro="Vous pouvez commencer dès aujourd’hui votre parcours de développement personnel avec Elevatis." />

            <div class="relative mt-16">
            <div aria-hidden="true" class="absolute top-8 right-[12%] left-[12%] hidden h-px bg-gradient-to-r from-mist via-brand/40 to-mist lg:block"></div>
            <ol class="relative grid gap-6 md:grid-cols-2 lg:grid-cols-4">
                @foreach ([
                    ['title' => 'Découvrez votre potentiel', 'text' => 'Explorez vos talents cachés et les possibilités infinies qui s’offrent à vous.'],
                    ['title' => 'Contactez-nous', 'text' => 'Faites le premier pas vers une vie épanouissante en nous contactant pour un accompagnement personnalisé.'],
                    ['title' => 'Choisissez votre formule', 'text' => 'Découvrez nos formules de coaching de vie et choisissez celle qui correspond le mieux à vos besoins.'],
                    ['title' => 'Commencez votre voyage', 'text' => 'Entamez un voyage de découverte de soi et de réalisation de votre plein potentiel avec notre équipe.'],
                ] as $step)
                    <li class="relative text-center" data-reveal style="--reveal-delay: {{ $loop->index * 100 }}ms">
                        <span class="relative mx-auto flex size-16 items-center justify-center rounded-full bg-brand text-xl font-semibold text-white ring-8 ring-white">
                            {{ str_pad($loop->iteration, 2, '0', STR_PAD_LEFT) }}
                        </span>
                        <h3 class="mt-6 text-lg font-semibold">{{ $step['title'] }}</h3>
                        <p class="mt-3 leading-relaxed">{{ $step['text'] }}</p>
                    </li>
                @endforeach
            </ol>
            </div>

            <div class="mt-14 flex flex-wrap justify-center gap-4" data-reveal>
                <a href="{{ route('pricing') }}" class="btn-primary">
                    Voir nos formules
                    <x-icon name="arrow-right" class="size-4" />
                </a>
                <a href="{{ route('contact') }}" class="btn-secondary">Nous contacter</a>
            </div>
        </div>
    </section>

    {{-- Différenciateurs --}}
    <section class="section bg-cloud">
        <div class="container-site">
            <x-section-heading eyebrow="Découvrez notre différence" title="Différenciateurs clés"
                               intro="Notre approche holistique vous permet de découvrir vos aspirations profondes." />

            <div class="mt-16 grid gap-6 md:grid-cols-3">
                @foreach ([
                    ['title' => 'Un service sur mesure pour votre évolution personnelle', 'text' => 'Un coaching adapté à vos besoins.'],
                    ['title' => 'Une compréhension profonde de vos besoins', 'text' => 'Nous sommes là pour vous écouter.'],
                    ['title' => 'Un environnement propice à votre épanouissement', 'text' => 'Un espace sécurisé pour votre développement.'],
                ] as $item)
                    <div class="card hover:-translate-y-1 hover:shadow-lift" data-reveal style="--reveal-delay: {{ $loop->index * 100 }}ms">
                        <span class="text-5xl font-semibold text-brand">{{ str_pad($loop->iteration, 2, '0', STR_PAD_LEFT) }}</span>
                        <h3 class="mt-6 text-xl leading-snug font-semibold">{{ $item['title'] }}</h3>
                        <p class="mt-3">{{ $item['text'] }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <x-cta-band eyebrow="Rejoignez-nous" title="Démarrez votre voyage de transformation maintenant" />
</x-layouts.app>
