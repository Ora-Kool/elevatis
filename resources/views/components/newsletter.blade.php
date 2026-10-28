<section id="newsletter" {{ $attributes->class(['section scroll-mt-24']) }}>
    <div class="container-site">
        <div class="relative overflow-hidden rounded-[2.5rem] bg-brand px-6 py-14 text-white sm:px-12 lg:px-20 lg:py-20" data-reveal>
            <div aria-hidden="true" class="brand-mark pointer-events-none absolute -top-20 -right-10 size-96 bg-white/[0.07]"></div>

            <div class="relative grid items-center gap-10 lg:grid-cols-2 lg:gap-16">
                <div>
                    <p class="eyebrow text-mist!">Abonnez-vous maintenant</p>
                    <h2 class="mt-4 text-3xl leading-tight font-semibold text-white! sm:text-4xl">
                        Recevez des conseils exclusifs en coaching de vie et développement personnel.
                    </h2>
                    <p class="mt-5 text-lg text-white/75">
                        Découvrez comment Elevatis peut vous aider à réaliser vos rêves et objectifs de vie.
                    </p>
                </div>

                <div>
                    @if (session('newsletter_success'))
                        <div class="flex items-start gap-3 rounded-2xl bg-white/10 p-5 ring-1 ring-white/20" role="status">
                            <x-icon name="check" class="mt-0.5 size-5" />
                            <p>{{ session('newsletter_success') }}</p>
                        </div>
                    @else
                        <form method="POST" action="{{ route('newsletter.store') }}" class="flex flex-col gap-3 sm:flex-row" novalidate>
                            @csrf
                            <div class="hidden" aria-hidden="true">
                                <label for="newsletter-website">Ne pas remplir</label>
                                <input type="text" id="newsletter-website" name="website" tabindex="-1" autocomplete="off">
                            </div>
                            <label for="newsletter-email" class="sr-only">Votre adresse e-mail</label>
                            <input type="email" id="newsletter-email" name="email" required autocomplete="email"
                                   value="{{ old('email') }}" placeholder="Votre adresse e-mail"
                                   class="min-w-0 flex-1 rounded-full border-0 bg-white px-6 py-4 text-ink placeholder:text-slate-brand/60 focus:ring-4 focus:ring-white/30 focus:outline-none">
                            <button type="submit" class="btn bg-ink text-white hover:bg-brand-dark">
                                Je m’abonne
                                <x-icon name="arrow-right" class="size-4" />
                            </button>
                        </form>
                        @error('email', 'newsletter')
                            <p class="mt-3 text-sm text-white">{{ $message }}</p>
                        @enderror
                        <p class="mt-4 text-sm text-white/60">Pas de spam. Désabonnement possible à tout moment.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>
