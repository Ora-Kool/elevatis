<x-layouts.app title="Page introuvable">
    <section class="relative overflow-hidden bg-cloud">
        <div aria-hidden="true" class="brand-mark pointer-events-none absolute top-1/2 left-1/2 size-[40rem] -translate-x-1/2 -translate-y-1/2 bg-brand/[0.05]"></div>
        <div class="container-site relative py-28 text-center sm:py-36">
            <p class="eyebrow justify-center">Erreur 404</p>
            <h1 class="mt-5 text-4xl font-semibold sm:text-6xl">Cette page s’est élevée un peu trop haut</h1>
            <p class="mx-auto mt-6 max-w-xl text-lg">La page que vous recherchez n’existe pas ou a été déplacée. Reprenons ensemble le bon chemin.</p>
            <div class="mt-10 flex flex-wrap justify-center gap-4">
                <a href="{{ route('home') }}" class="btn-primary">Retour à l’accueil</a>
                <a href="{{ route('contact') }}" class="btn-secondary">Nous contacter</a>
            </div>
        </div>
    </section>
</x-layouts.app>
