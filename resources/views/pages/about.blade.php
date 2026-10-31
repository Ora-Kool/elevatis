<x-layouts.app
    title="À propos"
    description="Elevatis accompagne les individus vers la réalisation de leur plein potentiel grâce à un coaching de vie personnalisé, holistique et fondé sur des méthodes éprouvées.">

    <x-page-hero
        eyebrow="À propos"
        title="Révélez votre plein potentiel avec Elevatis"
        intro="Votre partenaire pour une transformation personnelle et professionnelle. Découvrez votre potentiel et vivez une vie épanouissante grâce à notre accompagnement personnalisé."
        :image="asset('images/elevatis-sommet.jpg')"
        image-alt="Prendre de la hauteur : l’esprit Elevatis">
        <x-slot:actions>
            <a href="{{ route('contact') }}" class="btn-light">
                Commencer
                <x-icon name="arrow-right" class="size-4" />
            </a>
            <a href="{{ route('services') }}" class="btn-ghost-light">Nos services</a>
        </x-slot:actions>
    </x-page-hero>

    <section class="section bg-white">
        <div class="container-site">
            <x-section-heading eyebrow="Notre mission" title="Aider les individus à réaliser leur plein potentiel" />

            <div class="mt-20 grid gap-px bg-ink/8 lg:grid-cols-3">
                @foreach ([
                    ['n' => '01', 'title' => 'Mission', 'text' => 'Nous offrons des services de coaching de vie personnalisés et de haute qualité, basés sur une approche holistique et des méthodes éprouvées.'],
                    ['n' => '02', 'title' => 'Vision', 'text' => 'Créer un environnement de confiance où chacun peut explorer ses aspirations profondes.'],
                    ['n' => '03', 'title' => 'Valeurs', 'text' => 'Nous sommes transparents, empathiques et visons l’excellence dans nos services de coaching et d’accompagnement.'],
                ] as $item)
                    <div @class(['bg-white p-10 lg:p-12', 'bg-brand! text-white/80' => $loop->index === 1])
                         data-reveal style="--reveal-delay: {{ $loop->index * 100 }}ms">
                        <span @class(['display text-5xl italic', 'text-white/25' => $loop->index === 1, 'text-brand/20' => $loop->index !== 1])>{{ $item['n'] }}</span>
                        <h3 @class(['display mt-8 text-3xl italic', 'text-white!' => $loop->index === 1])>{{ $item['title'] }}</h3>
                        <p class="mt-4 leading-relaxed">{{ $item['text'] }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <section class="section bg-cloud">
        <div class="container-site grid items-center gap-16 lg:grid-cols-2">
            <div class="relative" data-reveal>
                <img src="{{ asset('images/elevatis-seance.jpg') }}" alt="Accompagnement Elevatis en séance"
                     width="1024" height="678" loading="lazy" class="aspect-[4/3] w-full object-cover">
                <div class="absolute right-0 -bottom-8 bg-brand p-6 text-white sm:p-8">
                    <p class="display text-4xl italic">9 800+</p>
                    <p class="mt-2 text-sm text-white/75">entretiens en coaching de vie réalisés</p>
                </div>
            </div>

            <div>
                <x-section-heading align="left" eyebrow="Prendre de la hauteur" title="Un chemin de transformation en quatre étapes"
                                   intro="Chaque accompagnement Elevatis est pensé pour vous faire grandir durablement, à votre rythme." />

                <div class="mt-10 space-y-0 divide-y divide-ink/10 border-y border-ink/10">
                    @foreach ([
                        ['title' => 'Transformation', 'text' => 'Changer de regard sur soi et sur sa vie.'],
                        ['title' => 'Croissance', 'text' => 'Développer ses compétences et sa posture.'],
                        ['title' => 'Confiance', 'text' => 'S’appuyer sur ses forces et ses valeurs.'],
                        ['title' => 'Épanouissement', 'text' => 'Vivre une vie alignée et pleine de sens.'],
                    ] as $pillar)
                        <div class="flex gap-6 py-5" data-reveal style="--reveal-delay: {{ $loop->index * 70 }}ms">
                            <span class="display text-2xl text-brand/40 italic">{{ str_pad($loop->iteration, 2, '0', STR_PAD_LEFT) }}</span>
                            <div>
                                <h3 class="font-semibold text-ink">{{ $pillar['title'] }}</h3>
                                <p class="mt-1 text-sm leading-relaxed">{{ $pillar['text'] }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <section class="grain relative overflow-hidden bg-ink py-24 text-white lg:py-32">
        <div class="container-site">
            <x-section-heading light eyebrow="Des résultats concrets" title="Elevatis en chiffres" />

            <dl class="mt-16 grid grid-cols-2 gap-10 border-t border-white/15 pt-14 lg:grid-cols-4">
                @foreach (config('elevatis.stats') as $stat)
                    <div data-reveal style="--reveal-delay: {{ $loop->index * 90 }}ms">
                        <dd class="display text-5xl text-white italic sm:text-6xl"
                            data-counter="{{ $stat['value'] }}" data-suffix="{{ $stat['suffix'] === '%' ? ' %' : $stat['suffix'] }}">
                            {{ number_format($stat['value'], 0, ',', ' ') }}{{ $stat['suffix'] === '%' ? ' %' : $stat['suffix'] }}
                        </dd>
                        <dt class="mt-4 text-sm text-white/60">{{ $stat['label'] }}</dt>
                    </div>
                @endforeach
            </dl>
        </div>
    </section>

    <section class="section bg-white">
        <div class="container-site">
            <x-section-heading eyebrow="Découvrez notre différence" title="Nos différenciateurs clés" />

            <div class="mt-16 grid gap-px bg-ink/8 sm:grid-cols-2 lg:grid-cols-4">
                @foreach ([
                    ['title' => 'Accompagnement personnalisé', 'text' => 'Un coaching adapté à vos besoins.'],
                    ['title' => 'Écoute active', 'text' => 'Nous sommes là pour vous écouter.'],
                    ['title' => 'Confiance et soutien', 'text' => 'Un espace sécurisé pour votre développement.'],
                    ['title' => 'Approche holistique', 'text' => 'Un travail sur tous les aspects de votre vie.'],
                ] as $item)
                    <div class="bg-cloud p-8" data-reveal style="--reveal-delay: {{ $loop->index * 80 }}ms">
                        <h3 class="display text-2xl italic">{{ $item['title'] }}</h3>
                        <p class="mt-4 leading-relaxed">{{ $item['text'] }}</p>
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
