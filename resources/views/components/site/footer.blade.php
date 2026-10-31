@php
    $contact = config('elevatis.contact');
@endphp

<footer class="relative overflow-hidden bg-ink text-white/65">
    <div aria-hidden="true" class="brand-mark pointer-events-none absolute -right-24 -bottom-24 size-[28rem] bg-white/[0.04]"></div>

    <div class="container-site relative py-16 lg:py-20">
        <p class="display max-w-4xl text-4xl text-white italic sm:text-5xl lg:text-6xl">Commencez par prendre de la hauteur.</p>

        <div class="mt-16 grid gap-12 sm:grid-cols-2 lg:grid-cols-12 lg:gap-8">
            <div class="lg:col-span-4">
                <a href="{{ route('home') }}" aria-label="Elevatis – Accueil">
                    <img src="{{ asset('images/elevatis-logo.png') }}" alt="Elevatis" width="364" height="200"
                         class="h-16 w-auto brightness-0 invert" loading="lazy">
                </a>
                <p class="mt-6 max-w-sm leading-relaxed">
                    Coaching de vie, formation et écoute active à {{ $contact['city'] }}. Un accompagnement pour révéler votre plein potentiel.
                </p>
            </div>

            <div class="lg:col-span-2 lg:col-start-6">
                <h2 class="text-[11px] font-semibold tracking-[0.22em] text-white uppercase">Navigation</h2>
                <ul class="mt-5 space-y-3">
                    @foreach (config('elevatis.navigation') as $item)
                        <li><a href="{{ route($item['route']) }}" class="transition hover:text-white">{{ $item['label'] }}</a></li>
                    @endforeach
                </ul>
            </div>

            <div class="lg:col-span-2">
                <h2 class="text-[11px] font-semibold tracking-[0.22em] text-white uppercase">Nos services</h2>
                <ul class="mt-5 space-y-3">
                    <li><a href="{{ route('services') }}#coaching" class="transition hover:text-white">Coaching de vie</a></li>
                    <li><a href="{{ route('services') }}#formation" class="transition hover:text-white">Formation</a></li>
                    <li><a href="{{ route('services') }}#ecoute" class="transition hover:text-white">Écoute active</a></li>
                    <li><a href="{{ route('services') }}#domaines" class="transition hover:text-white">Leadership &amp; management</a></li>
                </ul>
            </div>

            <div class="lg:col-span-3">
                <h2 class="text-[11px] font-semibold tracking-[0.22em] text-white uppercase">Contact</h2>
                <ul class="mt-5 space-y-4">
                    <li>
                        <a href="mailto:{{ $contact['email'] }}" class="flex items-start gap-3 transition hover:text-white">
                            <x-icon name="mail" class="mt-0.5 text-mist" />
                            {{ $contact['email'] }}
                        </a>
                    </li>
                    <li>
                        <a href="tel:{{ $contact['phone_href'] }}" class="flex items-start gap-3 transition hover:text-white">
                            <x-icon name="phone" class="mt-0.5 text-mist" />
                            {{ $contact['phone'] }}
                        </a>
                    </li>
                    <li>
                        <a href="https://wa.me/{{ $contact['whatsapp'] }}" target="_blank" rel="noopener" class="flex items-start gap-3 transition hover:text-white">
                            <x-icon name="whatsapp" class="mt-0.5 text-mist" />
                            WhatsApp
                        </a>
                    </li>
                    <li class="flex items-start gap-3">
                        <x-icon name="map-pin" class="mt-0.5 text-mist" />
                        {{ $contact['city'] }}, {{ $contact['country'] }}
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <div class="relative border-t border-white/10">
        <div class="container-site flex flex-col items-center justify-between gap-4 py-6 text-sm sm:flex-row">
            <p>&copy; {{ date('Y') }} {{ config('elevatis.name') }}. Tous droits réservés.</p>
            <p class="text-white/40">Coach de vie · {{ $contact['city'] }}</p>
        </div>
    </div>
</footer>
