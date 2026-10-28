@php
    $contact = config('elevatis.contact');
@endphp

<x-layouts.app
    title="Contact"
    description="Contactez Elevatis à Douala par téléphone, WhatsApp, e-mail ou via notre formulaire pour démarrer votre accompagnement personnalisé.">

    <x-page-hero
        eyebrow="Contact"
        title="Contactez-nous"
        intro="Vous êtes prêt à découvrir votre potentiel et à vivre une vie épanouissante ? N’hésitez pas, contactez-nous dès maintenant !" />

    <section class="section">
        <div class="container-site grid gap-12 lg:grid-cols-12 lg:gap-16">
            {{-- Coordonnées --}}
            <div class="space-y-5 lg:col-span-5">
                @foreach ([
                    ['icon' => 'whatsapp', 'label' => 'WhatsApp', 'value' => 'Écrivez-nous directement', 'href' => 'https://wa.me/'.$contact['whatsapp'].'?text='.rawurlencode($contact['whatsapp_message']), 'external' => true],
                    ['icon' => 'phone', 'label' => 'Téléphone', 'value' => $contact['phone'], 'href' => 'tel:'.$contact['phone_href'], 'external' => false],
                    ['icon' => 'mail', 'label' => 'E-mail', 'value' => $contact['email'], 'href' => 'mailto:'.$contact['email'], 'external' => false],
                ] as $channel)
                    <a href="{{ $channel['href'] }}" @if ($channel['external']) target="_blank" rel="noopener" @endif
                       class="group flex items-center gap-5 rounded-3xl border border-ink/5 bg-white p-6 shadow-soft transition duration-500 hover:-translate-y-1 hover:border-brand/30 hover:shadow-lift"
                       data-reveal style="--reveal-delay: {{ $loop->index * 80 }}ms">
                        <span class="flex size-14 shrink-0 items-center justify-center rounded-2xl bg-cloud text-brand transition group-hover:bg-brand group-hover:text-white">
                            <x-icon :name="$channel['icon']" class="size-6" />
                        </span>
                        <span class="min-w-0 flex-1">
                            <span class="block text-sm">{{ $channel['label'] }}</span>
                            <span class="block truncate text-lg font-semibold text-ink">{{ $channel['value'] }}</span>
                        </span>
                        <x-icon name="arrow-right" class="size-5 text-brand opacity-0 transition group-hover:translate-x-1 group-hover:opacity-100" />
                    </a>
                @endforeach

                <div class="overflow-hidden rounded-3xl border border-ink/5 shadow-soft" data-reveal>
                    <iframe title="Localisation d’Elevatis à {{ $contact['city'] }}"
                            src="https://maps.google.com/maps?q={{ rawurlencode($contact['map_query']) }}&z=12&output=embed"
                            class="h-72 w-full grayscale-[30%]" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    <div class="flex items-center gap-3 bg-white p-5">
                        <x-icon name="map-pin" class="text-brand" />
                        <span class="font-medium text-ink">{{ $contact['city'] }}, {{ $contact['country'] }}</span>
                    </div>
                </div>
            </div>

            {{-- Formulaire --}}
            <div id="formulaire" class="scroll-mt-32 lg:col-span-7">
                <div class="rounded-[2rem] border border-ink/5 bg-white p-8 shadow-lift sm:p-12" data-reveal>
                    <h2 class="text-3xl font-semibold">Envoyez-nous un message</h2>
                    <p class="mt-3">Nous vous répondons dans les plus brefs délais.</p>

                    @if (session('contact_success'))
                        <div class="mt-8 flex items-start gap-4 rounded-2xl bg-brand/10 p-6 text-brand-dark" role="status">
                            <span class="flex size-10 shrink-0 items-center justify-center rounded-full bg-brand text-white">
                                <x-icon name="check" class="size-5" />
                            </span>
                            <p class="pt-2 font-medium">{{ session('contact_success') }}</p>
                        </div>
                    @endif

                    @if ($errors->any())
                        <div class="mt-8 rounded-2xl bg-red-50 p-5 text-sm text-red-800" role="alert">
                            Merci de corriger les champs indiqués ci-dessous.
                        </div>
                    @endif

                    <form method="POST" action="{{ route('contact.store') }}" class="mt-10 grid gap-6 sm:grid-cols-2" novalidate>
                        @csrf

                        <div class="hidden" aria-hidden="true">
                            <label for="website">Ne pas remplir</label>
                            <input type="text" id="website" name="website" tabindex="-1" autocomplete="off">
                        </div>

                        <div>
                            <label for="first_name" class="field-label">Prénom <span class="text-brand">*</span></label>
                            <input type="text" id="first_name" name="first_name" value="{{ old('first_name') }}" required autocomplete="given-name"
                                   class="field" @error('first_name') aria-invalid="true" aria-describedby="first_name-error" @enderror>
                            @error('first_name') <p id="first_name-error" class="field-error">{{ $message }}</p> @enderror
                        </div>

                        <div>
                            <label for="last_name" class="field-label">Nom <span class="text-brand">*</span></label>
                            <input type="text" id="last_name" name="last_name" value="{{ old('last_name') }}" required autocomplete="family-name"
                                   class="field" @error('last_name') aria-invalid="true" aria-describedby="last_name-error" @enderror>
                            @error('last_name') <p id="last_name-error" class="field-error">{{ $message }}</p> @enderror
                        </div>

                        <div>
                            <label for="email" class="field-label">E-mail <span class="text-brand">*</span></label>
                            <input type="email" id="email" name="email" value="{{ old('email') }}" required autocomplete="email"
                                   class="field" @error('email') aria-invalid="true" aria-describedby="email-error" @enderror>
                            @error('email') <p id="email-error" class="field-error">{{ $message }}</p> @enderror
                        </div>

                        <div>
                            <label for="phone" class="field-label">Téléphone <span class="font-normal text-slate-brand/60">(facultatif)</span></label>
                            <input type="tel" id="phone" name="phone" value="{{ old('phone') }}" autocomplete="tel" placeholder="+237 …"
                                   class="field" @error('phone') aria-invalid="true" aria-describedby="phone-error" @enderror>
                            @error('phone') <p id="phone-error" class="field-error">{{ $message }}</p> @enderror
                        </div>

                        <div class="sm:col-span-2">
                            <label for="subject" class="field-label">Sujet <span class="text-brand">*</span></label>
                            <div class="relative">
                                <select id="subject" name="subject" required class="field appearance-none pr-12"
                                        @error('subject') aria-invalid="true" aria-describedby="subject-error" @enderror>
                                    <option value="" disabled @selected(! old('subject', $selected))>Choisissez un sujet</option>
                                    @foreach ($subjects as $value => $label)
                                        <option value="{{ $value }}" @selected(old('subject', $selected) === $value)>{{ $label }}</option>
                                    @endforeach
                                </select>
                                <x-icon name="chevron-down" class="pointer-events-none absolute top-1/2 right-4 size-5 -translate-y-1/2 text-brand" />
                            </div>
                            @error('subject') <p id="subject-error" class="field-error">{{ $message }}</p> @enderror
                        </div>

                        <div class="sm:col-span-2">
                            <label for="message" class="field-label">Message <span class="text-brand">*</span></label>
                            <textarea id="message" name="message" rows="6" required
                                      class="field resize-y" placeholder="Parlez-nous de vos objectifs et de ce que vous attendez de votre accompagnement…"
                                      @error('message') aria-invalid="true" aria-describedby="message-error" @enderror>{{ old('message') }}</textarea>
                            @error('message') <p id="message-error" class="field-error">{{ $message }}</p> @enderror
                        </div>

                        <div class="flex flex-col gap-4 sm:col-span-2 sm:flex-row sm:items-center sm:justify-between">
                            <p class="text-sm text-slate-brand/70">Vos informations restent strictement confidentielles.</p>
                            <button type="submit" class="btn-primary">
                                Envoyer le message
                                <x-icon name="arrow-right" class="size-4" />
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    {{-- Services rappel --}}
    <section class="section border-t border-ink/5">
        <div class="container-site">
            <x-section-heading eyebrow="Développement personnel" title="Plongez dans l’univers Elevatis"
                               intro="Plongez dans l’univers du développement personnel avec Elevatis et transformez votre vie." />

            <div class="mt-16 grid gap-6 md:grid-cols-3">
                @foreach ([
                    ['id' => 'coaching', 'icon' => 'sparkles', 'title' => 'Coaching de vie', 'text' => 'Développez votre potentiel et atteignez vos objectifs.'],
                    ['id' => 'formation', 'icon' => 'academic-cap', 'title' => 'Formation', 'text' => 'Acquérez de nouvelles compétences et évoluez professionnellement.'],
                    ['id' => 'ecoute', 'icon' => 'chat', 'title' => 'Écoute', 'text' => 'Un espace pour vous exprimer librement.'],
                ] as $service)
                    <a href="{{ route('services') }}#{{ $service['id'] }}" class="card group hover:-translate-y-1 hover:shadow-lift" data-reveal style="--reveal-delay: {{ $loop->index * 100 }}ms">
                        <span class="flex size-14 items-center justify-center rounded-2xl bg-cloud text-brand transition group-hover:bg-brand group-hover:text-white">
                            <x-icon :name="$service['icon']" class="size-7" />
                        </span>
                        <h3 class="mt-6 text-xl font-semibold">{{ $service['title'] }}</h3>
                        <p class="mt-3 leading-relaxed">{{ $service['text'] }}</p>
                    </a>
                @endforeach
            </div>
        </div>
    </section>
</x-layouts.app>
