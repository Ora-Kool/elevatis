@php
    $contact = config('elevatis.contact');
    $navigation = config('elevatis.navigation');
@endphp

<div class="hidden bg-brand-dark text-white/80 lg:block">
    <div class="container-site flex h-10 items-center justify-between text-[13px]">
        <p class="flex items-center gap-2">
            <x-icon name="map-pin" class="size-4 text-white/60" />
            Coaching de vie, formation et écoute active · {{ $contact['city'] }}, {{ $contact['country'] }}
        </p>
        <div class="flex items-center gap-6">
            <a href="mailto:{{ $contact['email'] }}" class="flex items-center gap-2 transition hover:text-white">
                <x-icon name="mail" class="size-4 text-white/60" />
                {{ $contact['email'] }}
            </a>
            <a href="tel:{{ $contact['phone_href'] }}" class="flex items-center gap-2 transition hover:text-white">
                <x-icon name="phone" class="size-4 text-white/60" />
                {{ $contact['phone'] }}
            </a>
        </div>
    </div>
</div>

<header data-site-header class="sticky top-0 z-50 border-b border-transparent bg-white/95 backdrop-blur transition-all duration-300 data-scrolled:border-ink/5 data-scrolled:shadow-soft">
    <div class="container-site flex h-20 items-center justify-between gap-6 lg:h-24">
        <a href="{{ route('home') }}" class="shrink-0" aria-label="Elevatis – Accueil">
            <img src="{{ asset('images/elevatis-logo.png') }}" alt="Elevatis – Commencez par prendre de la hauteur"
                 width="364" height="200" class="h-16 w-auto lg:h-20">
        </a>

        <nav aria-label="Navigation principale" class="hidden lg:block">
            <ul class="flex items-center gap-1 font-nav text-[15px] font-medium">
                @foreach ($navigation as $item)
                    @php $active = request()->routeIs($item['route']); @endphp
                    <li>
                        <a href="{{ route($item['route']) }}"
                           @class([
                               'relative rounded-full px-4 py-2 transition',
                               'text-brand' => $active,
                               'text-ink hover:text-brand' => ! $active,
                           ])
                           @if ($active) aria-current="page" @endif>
                            {{ $item['label'] }}
                            @if ($active)
                                <span class="absolute inset-x-4 -bottom-0.5 h-0.5 rounded-full bg-brand"></span>
                            @endif
                        </a>
                    </li>
                @endforeach
            </ul>
        </nav>

        <div class="flex items-center gap-3">
            <a href="{{ route('contact') }}" class="btn-primary hidden sm:inline-flex">
                Prendre rendez-vous
                <x-icon name="arrow-right" class="size-4" />
            </a>
            <button type="button" data-menu-toggle aria-expanded="false" aria-controls="menu-mobile"
                    class="group inline-flex size-12 items-center justify-center rounded-full border border-ink/10 text-ink transition hover:border-brand hover:text-brand lg:hidden">
                <span class="sr-only">Ouvrir le menu</span>
                <x-icon name="menu" class="size-6 group-aria-expanded:hidden" />
                <x-icon name="close" class="hidden size-6 group-aria-expanded:block" />
            </button>
        </div>
    </div>

    <div id="menu-mobile" data-mobile-menu hidden class="border-t border-ink/5 bg-white lg:hidden">
        <nav aria-label="Navigation mobile" class="container-site flex max-h-[calc(100dvh-5rem)] flex-col gap-1 overflow-y-auto py-6">
            @foreach ($navigation as $item)
                @php $active = request()->routeIs($item['route']); @endphp
                <a href="{{ route($item['route']) }}"
                   @class([
                       'flex items-center justify-between rounded-2xl px-4 py-4 font-nav text-lg font-medium transition',
                       'bg-cloud text-brand' => $active,
                       'text-ink hover:bg-cloud' => ! $active,
                   ])
                   @if ($active) aria-current="page" @endif>
                    {{ $item['label'] }}
                    <x-icon name="arrow-right" class="size-4 opacity-40" />
                </a>
            @endforeach

            <div class="mt-4 grid gap-3 border-t border-ink/5 pt-6">
                <a href="{{ route('contact') }}" class="btn-primary w-full">Prendre rendez-vous</a>
                <a href="tel:{{ $contact['phone_href'] }}" class="btn-secondary w-full">
                    <x-icon name="phone" class="size-4" />
                    {{ $contact['phone'] }}
                </a>
            </div>
        </nav>
    </div>
</header>
