<x-layouts.app
    title="À propos"
    description="Elevatis accompagne les individus vers la réalisation de leur plein potentiel grâce à un coaching de vie personnalisé, holistique et fondé sur des méthodes éprouvées.">

    <x-page-hero
        eyebrow="À propos"
        title="Révélez votre plein potentiel avec Elevatis"
        intro="Votre partenaire pour une transformation personnelle et professionnelle. Découvrez votre potentiel et vivez une vie épanouissante grâce à notre accompagnement personnalisé."
        :image="asset('images/elevatis-equipe.jpg')"
        image-alt="L’équipe Elevatis en séance de travail">
        <x-slot:actions>
            <a href="{{ route('contact') }}" class="btn-primary">
                Commencer
                <x-icon name="arrow-right" class="size-4" />
            </a>
            <a href="{{ route('services') }}" class="btn-secondary">Nos services</a>
        </x-slot:actions>
    </x-page-hero>

    {{-- Mission, vision, valeurs --}}
    <section class="section">
        <div class="container-site">
            <x-section-heading eyebrow="Notre mission" title="Aider les individus à réaliser leur plein potentiel" />

            <div class="mt-16 grid gap-6 md:grid-cols-3">
                @foreach ([
                    ['icon' => 'flag', 'title' => 'Mission', 'text' => 'Nous offrons des services de coaching de vie personnalisés et de haute qualité, basés sur une approche holistique et des méthodes éprouvées.'],
                    ['icon' => 'eye', 'title' => 'Vision', 'text' => 'Créer un environnement de confiance où chacun peut explorer ses aspirations profondes.'],
                    ['icon' => 'heart', 'title' => 'Valeurs', 'text' => 'Nous sommes transparents, empathiques et visons l’excellence dans nos services de coaching et d’accompagnement.'],
                ] as $item)
                    <div @class([
                        'card hover:-translate-y-1 hover:shadow-lift',
                        'bg-brand! text-white/80 border-transparent!' => $loop->index === 1,
                    ]) data-reveal style="--reveal-delay: {{ $loop->index * 100 }}ms">
                        <span @class([
                            'flex size-14 items-center justify-center rounded-2xl',
                            'bg-white/10 text-white' => $loop->index === 1,
                            'bg-cloud text-brand' => $loop->index !== 1,
                        ])>
                            <x-icon :name="$item['icon']" class="size-7" />
                        </span>
                        <h3 @class(['mt-6 text-2xl font-semibold', 'text-white!' => $loop->index === 1])>{{ $item['title'] }}</h3>
                        <p class="mt-3 leading-relaxed">{{ $item['text'] }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- Piliers --}}
    <section class="section bg-cloud">
        <div class="container-site grid items-center gap-16 lg:grid-cols-2">
            <div class="relative" data-reveal>
                <img src="{{ asset('images/elevatis-sommet.jpg') }}" alt="Deux personnes s’entraidant au sommet d’une montagne au coucher du soleil"
                     width="1024" height="576" loading="lazy" class="aspect-[4/3] w-full rounded-[2rem] object-cover shadow-lift">
                <div class="absolute -right-4 -bottom-8 max-w-[15rem] rounded-2xl bg-white p-6 shadow-lift sm:-right-8">
                    <p class="text-4xl font-semibold text-brand">9 800+</p>
                    <p class="mt-2 text-sm leading-snug">entretiens en coaching de vie réalisés</p>
                </div>
            </div>

            <div>
                <x-section-heading align="left" eyebrow="Prendre de la hauteur" title="Un chemin de transformation en quatre étapes"
                                   intro="Chaque accompagnement Elevatis est pensé pour vous faire grandir durablement, à votre rythme." />

                <div class="mt-10 grid gap-4 sm:grid-cols-2">
                    @foreach ([
                        ['icon' => 'sparkles', 'title' => 'Transformation', 'text' => 'Changer de regard sur soi et sur sa vie.'],
                        ['icon' => 'trending-up', 'title' => 'Croissance', 'text' => 'Développer ses compétences et sa posture.'],
                        ['icon' => 'shield-check', 'title' => 'Confiance', 'text' => 'S’appuyer sur ses forces et ses valeurs.'],
                        ['icon' => 'sun', 'title' => 'Épanouissement', 'text' => 'Vivre une vie alignée et pleine de sens.'],
                    ] as $pillar)
                        <div class="flex gap-4 rounded-2xl bg-white p-5 shadow-soft" data-reveal style="--reveal-delay: {{ $loop->index * 80 }}ms">
                            <x-icon :name="$pillar['icon']" class="size-6 text-brand" />
                            <div>
                                <h3 class="font-semibold">{{ $pillar['title'] }}</h3>
                                <p class="mt-1 text-sm leading-relaxed">{{ $pillar['text'] }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    {{-- Chiffres --}}
    <section class="section">
        <div class="container-site">
            <x-section-heading eyebrow="Des résultats concrets" title="Elevatis en chiffres" />

            <dl class="mt-16 grid grid-cols-2 gap-5 lg:grid-cols-4">
                @foreach (config('elevatis.stats') as $stat)
                    <div class="rounded-3xl bg-cloud p-8 text-center" data-reveal style="--reveal-delay: {{ $loop->index * 100 }}ms">
                        <dd class="text-4xl font-semibold tracking-tight text-brand sm:text-5xl"
                            data-counter="{{ $stat['value'] }}" data-suffix="{{ $stat['suffix'] === '%' ? ' %' : $stat['suffix'] }}">
                            {{ number_format($stat['value'], 0, ',', ' ') }}{{ $stat['suffix'] === '%' ? ' %' : $stat['suffix'] }}
                        </dd>
                        <dt class="mt-3 text-sm">{{ $stat['label'] }}</dt>
                    </div>
                @endforeach
            </dl>
        </div>
    </section>

    {{-- Différenciateurs --}}
    <section class="section bg-cloud">
        <div class="container-site">
            <x-section-heading eyebrow="Découvrez notre différence" title="Nos différenciateurs clés" />

            <div class="mt-16 grid gap-6 sm:grid-cols-2 lg:grid-cols-4">
                @foreach ([
                    ['icon' => 'user', 'title' => 'Accompagnement personnalisé', 'text' => 'Un coaching adapté à vos besoins.'],
                    ['icon' => 'chat', 'title' => 'Écoute active', 'text' => 'Nous sommes là pour vous écouter.'],
                    ['icon' => 'shield-check', 'title' => 'Confiance et soutien', 'text' => 'Un espace sécurisé pour votre développement.'],
                    ['icon' => 'globe', 'title' => 'Approche holistique', 'text' => 'Un travail sur tous les aspects de votre vie.'],
                ] as $item)
                    <div class="card group hover:-translate-y-1 hover:shadow-lift" data-reveal style="--reveal-delay: {{ $loop->index * 100 }}ms">
                        <span class="flex size-14 items-center justify-center rounded-2xl bg-cloud text-brand transition group-hover:bg-brand group-hover:text-white">
                            <x-icon :name="$item['icon']" class="size-7" />
                        </span>
                        <h3 class="mt-6 text-xl font-semibold">{{ $item['title'] }}</h3>
                        <p class="mt-3 leading-relaxed">{{ $item['text'] }}</p>
                    </div>
                @endforeach
            </div>

            <div class="mt-14 text-center" data-reveal>
                <a href="{{ route('contact') }}" class="btn-primary">
                    Commencer votre accompagnement
                    <x-icon name="arrow-right" class="size-4" />
                </a>
            </div>
        </div>
    </section>

    <x-cta-band />
</x-layouts.app>
