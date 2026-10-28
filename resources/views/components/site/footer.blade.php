@php
    $contact = config('elevatis.contact');
@endphp

<footer class="relative overflow-hidden border-t border-ink/5 bg-cloud">
    <div aria-hidden="true" class="brand-mark pointer-events-none absolute -right-24 -bottom-24 size-[28rem] bg-brand/[0.04]"></div>

    <div class="container-site relative grid gap-12 py-16 sm:grid-cols-2 lg:grid-cols-12 lg:gap-8 lg:py-20">
        <div class="lg:col-span-4">
            <a href="{{ route('home') }}" aria-label="Elevatis – Accueil">
                <img src="{{ asset('images/elevatis-logo.png') }}" alt="Elevatis" width="364" height="200" class="h-20 w-auto" loading="lazy">
            </a>
            <p class="mt-6 max-w-sm leading-relaxed">
                Votre partenaire pour une vie épanouissante et significative. Coaching de vie personnalisé, formation et écoute active pour révéler votre plein potentiel.
            </p>
        </div>

        <div class="lg:col-span-2 lg:col-start-6">
            <h2 class="text-sm font-semibold tracking-[0.15em] uppercase">Navigation</h2>
            <ul class="mt-5 space-y-3">
                @foreach (config('elevatis.navigation') as $item)
                    <li><a href="{{ route($item['route']) }}" class="transition hover:text-brand">{{ $item['label'] }}</a></li>
                @endforeach
            </ul>
        </div>

        <div class="lg:col-span-2">
            <h2 class="text-sm font-semibold tracking-[0.15em] uppercase">Nos services</h2>
            <ul class="mt-5 space-y-3">
                <li><a href="{{ route('services') }}#coaching" class="transition hover:text-brand">Coaching de vie</a></li>
                <li><a href="{{ route('services') }}#formation" class="transition hover:text-brand">Formation</a></li>
                <li><a href="{{ route('services') }}#ecoute" class="transition hover:text-brand">Écoute active</a></li>
                <li><a href="{{ route('services') }}#domaines" class="transition hover:text-brand">Leadership &amp; management</a></li>
            </ul>
        </div>

        <div class="lg:col-span-3">
            <h2 class="text-sm font-semibold tracking-[0.15em] uppercase">Contact</h2>
            <ul class="mt-5 space-y-4">
                <li>
                    <a href="mailto:{{ $contact['email'] }}" class="flex items-start gap-3 transition hover:text-brand">
                        <x-icon name="mail" class="mt-0.5 text-brand" />
                        {{ $contact['email'] }}
                    </a>
                </li>
                <li>
                    <a href="tel:{{ $contact['phone_href'] }}" class="flex items-start gap-3 transition hover:text-brand">
                        <x-icon name="phone" class="mt-0.5 text-brand" />
                        {{ $contact['phone'] }}
                    </a>
                </li>
                <li>
                    <a href="https://wa.me/{{ $contact['whatsapp'] }}" target="_blank" rel="noopener" class="flex items-start gap-3 transition hover:text-brand">
                        <x-icon name="whatsapp" class="mt-0.5 text-brand" />
                        WhatsApp
                    </a>
                </li>
                <li class="flex items-start gap-3">
                    <x-icon name="map-pin" class="mt-0.5 text-brand" />
                    {{ $contact['city'] }}, {{ $contact['country'] }}
                </li>
            </ul>
        </div>
    </div>

    <div class="relative border-t border-ink/5">
        <div class="container-site flex flex-col items-center justify-between gap-4 py-6 text-sm sm:flex-row">
            <p>&copy; {{ date('Y') }} {{ config('elevatis.name') }}. Tous droits réservés.</p>
            <p class="font-medium text-ink">Commencez par prendre de la hauteur.</p>
        </div>
    </div>
</footer>
