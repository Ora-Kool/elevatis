<x-layouts.app
    title="Services"
    description="Coaching de vie, accompagnement personnel et formation : découvrez les services Elevatis pour révéler votre plein potentiel et vivre une vie épanouie.">

    <x-page-hero
        eyebrow="Services"
        title="Votre partenaire pour une vie épanouissante et significative"
        intro="Coaching de vie, accompagnement personnel et formation : nous vous accompagnons vers la découverte de votre plein potentiel." />

    <section class="bg-white">
        <div class="container-site grid gap-0 sm:grid-cols-2 lg:grid-cols-4">
            @foreach ([
                ['n' => '01', 'text' => 'Plus de 9 800 séances et des clients transformés'],
                ['n' => '02', 'text' => 'Des résultats concrets et durables pour nos clients'],
                ['n' => '03', 'text' => 'Une équipe dévouée et passionnée pour vous accompagner'],
                ['n' => '04', 'text' => 'Reconnue pour son approche holistique et personnalisée'],
            ] as $item)
                <div class="flex gap-4 border-ink/8 py-10 sm:border-r sm:px-6 sm:last:border-r-0 lg:first:pl-0" data-reveal style="--reveal-delay: {{ $loop->index * 80 }}ms">
                    <span class="display text-2xl text-brand/35 italic">{{ $item['n'] }}</span>
                    <p class="text-sm leading-snug font-medium text-ink">{{ $item['text'] }}</p>
                </div>
            @endforeach
        </div>
    </section>

    <section class="section bg-cloud">
        <div class="container-site">
            <x-section-heading eyebrow="Découvrez" title="Une approche holistique pour révéler vos aspirations profondes" />

            <div class="mt-20 space-y-0">
                @foreach ([
                    [
                        'id' => 'coaching',
                        'n' => '01',
                        'label' => 'Coaching de vie',
                        'title' => 'Accompagnement personnalisé pour une vie épanouissante',
                        'text' => 'Découvrez votre potentiel et atteignez vos objectifs avec notre coaching. Ensemble, nous identifions vos objectifs, levons les obstacles personnels et construisons un plan d’action qui vous ressemble.',
                        'points' => ['Identification de vos objectifs', 'Dépassement des blocages personnels', 'Soutien individualisé à chaque étape'],
                        'image' => 'elevatis-seance-coaching.jpg',
                        'alt' => 'Coach Elevatis en séance individuelle',
                    ],
                    [
                        'id' => 'formation',
                        'n' => '02',
                        'label' => 'Formation',
                        'title' => 'Développement personnel grâce à nos formations spécialisées',
                        'text' => 'Acquérez les compétences nécessaires à votre épanouissement personnel et à votre évolution professionnelle, à travers des programmes de formation sur mesure.',
                        'points' => ['Programmes adaptés à vos besoins', 'Compétences personnelles et professionnelles', 'Autonomie et responsabilisation'],
                        'image' => 'elevatis-formation.jpg',
                        'alt' => 'Formation animée par Elevatis',
                    ],
                    [
                        'id' => 'ecoute',
                        'n' => '03',
                        'label' => 'Écoute active',
                        'title' => 'Écoute active pour une compréhension profonde de vos besoins',
                        'text' => 'Nous vous écoutons attentivement pour mieux vous accompagner vers la réussite. Un espace où vous exprimer librement, et où apprendre à développer des relations authentiques.',
                        'points' => ['Un espace pour vous exprimer librement', 'Un cadre bienveillant et confidentiel', 'L’art de l’écoute au service de vos relations'],
                        'image' => 'elevatis-ecoute.jpg',
                        'alt' => 'Échange en toute confiance lors d’une séance d’écoute',
                    ],
                ] as $service)
                    <article id="{{ $service['id'] }}" class="grid scroll-mt-32 items-center gap-10 border-t border-ink/10 py-16 lg:grid-cols-12 lg:gap-16 lg:py-24">
                        <div @class(['relative lg:col-span-6', 'lg:order-2' => $loop->odd]) data-reveal>
                            <span class="display absolute -top-8 left-0 text-7xl text-brand/15 italic">{{ $service['n'] }}</span>
                            <img src="{{ asset('images/'.$service['image']) }}" alt="{{ $service['alt'] }}" loading="lazy"
                                 class="relative aspect-[4/3] w-full object-cover">
                        </div>

                        <div class="lg:col-span-6" data-reveal style="--reveal-delay: 120ms">
                            <p class="eyebrow">{{ $service['label'] }}</p>
                            <h3 class="display mt-5 text-3xl italic sm:text-4xl lg:text-5xl">{{ $service['title'] }}</h3>
                            <p class="mt-6 text-lg leading-relaxed">{{ $service['text'] }}</p>
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

    <section id="domaines" class="section scroll-mt-24 bg-white">
        <div class="container-site">
            <x-section-heading eyebrow="Nos principaux domaines" title="Des méthodes éprouvées pour chaque dimension de votre vie"
                               intro="Explorez nos domaines d’intervention pour vous accompagner vers la réalisation de votre plein potentiel." />

            <div class="mt-16 grid gap-px bg-ink/8 sm:grid-cols-2">
                @foreach ([
                    ['title' => 'Développement personnel', 'text' => 'Notre approche holistique aide les individus à se découvrir, à définir leurs objectifs et à les atteindre pour une vie épanouissante.'],
                    ['title' => 'Leadership et management', 'text' => 'Nous accompagnons les professionnels à développer leurs compétences de leadership et de gestion pour atteindre leurs objectifs avec excellence.'],
                    ['title' => 'Bien-être et santé', 'text' => 'Par un accompagnement personnalisé, nous créons un environnement de confiance pour explorer vos aspirations profondes et atteindre une vie épanouissante.'],
                    ['title' => 'Éducation et formation', 'text' => 'En favorisant l’autonomie et la responsabilisation, nous aidons chacun à réaliser son plein potentiel à travers des programmes de formation sur mesure.'],
                ] as $domain)
                    <div class="bg-cloud p-8 sm:p-10" data-reveal style="--reveal-delay: {{ $loop->index * 80 }}ms">
                        <span class="display text-3xl text-brand/25 italic">{{ str_pad($loop->iteration, 2, '0', STR_PAD_LEFT) }}</span>
                        <h3 class="display mt-6 text-2xl italic">{{ $domain['title'] }}</h3>
                        <p class="mt-4 leading-relaxed">{{ $domain['text'] }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <section class="section bg-cloud">
        <div class="container-site">
            <x-section-heading eyebrow="Comment commencer" title="Votre parcours pour prendre de la hauteur"
                               intro="Vous pouvez commencer dès aujourd’hui votre parcours de développement personnel avec Elevatis." />

            <ol class="mt-16 grid gap-px bg-ink/8 md:grid-cols-2 lg:grid-cols-4">
                @foreach ([
                    ['title' => 'Découvrez votre potentiel', 'text' => 'Explorez vos talents cachés et les possibilités infinies qui s’offrent à vous.'],
                    ['title' => 'Contactez-nous', 'text' => 'Faites le premier pas vers une vie épanouissante en nous contactant pour un accompagnement personnalisé.'],
                    ['title' => 'Choisissez votre formule', 'text' => 'Découvrez nos formules de coaching de vie et choisissez celle qui correspond le mieux à vos besoins.'],
                    ['title' => 'Commencez votre voyage', 'text' => 'Entamez un voyage de découverte de soi et de réalisation de votre plein potentiel avec notre équipe.'],
                ] as $step)
                    <li class="bg-white p-8" data-reveal style="--reveal-delay: {{ $loop->index * 100 }}ms">
                        <span class="display text-5xl text-brand italic">{{ str_pad($loop->iteration, 2, '0', STR_PAD_LEFT) }}</span>
                        <h3 class="mt-6 text-lg font-semibold">{{ $step['title'] }}</h3>
                        <p class="mt-3 leading-relaxed">{{ $step['text'] }}</p>
                    </li>
                @endforeach
            </ol>

            <div class="mt-14 flex flex-wrap justify-center gap-4" data-reveal>
                <a href="{{ route('pricing') }}" class="btn-primary">
                    Voir nos formules
                    <x-icon name="arrow-right" class="size-4" />
                </a>
                <a href="{{ route('contact') }}" class="btn-secondary">Nous contacter</a>
            </div>
        </div>
    </section>

    <section class="section bg-white">
        <div class="container-site">
            <x-section-heading eyebrow="Découvrez notre différence" title="Différenciateurs clés"
                               intro="Notre approche holistique vous permet de découvrir vos aspirations profondes." />

            <div class="mt-16 grid gap-px bg-ink/8 md:grid-cols-3">
                @foreach ([
                    ['title' => 'Un service sur mesure pour votre évolution personnelle', 'text' => 'Un coaching adapté à vos besoins.'],
                    ['title' => 'Une compréhension profonde de vos besoins', 'text' => 'Nous sommes là pour vous écouter.'],
                    ['title' => 'Un environnement propice à votre épanouissement', 'text' => 'Un espace sécurisé pour votre développement.'],
                ] as $item)
                    <div class="bg-cloud p-10" data-reveal style="--reveal-delay: {{ $loop->index * 100 }}ms">
                        <span class="display text-5xl text-brand italic">{{ str_pad($loop->iteration, 2, '0', STR_PAD_LEFT) }}</span>
                        <h3 class="display mt-6 text-2xl leading-snug italic">{{ $item['title'] }}</h3>
                        <p class="mt-4">{{ $item['text'] }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <x-cta-band eyebrow="Rejoignez-nous" title="Démarrez votre voyage de transformation maintenant" />
</x-layouts.app>
