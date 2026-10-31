@props([
    'eyebrow' => 'Agissez maintenant',
    'title' => 'La prochaine élévation commence par un premier choix.',
    'text' => 'Un premier échange suffit pour poser les bases. Coaching de vie, formation ou écoute active : nous vous accueillons là où vous en êtes.',
])

<section class="grain relative isolate overflow-hidden bg-ink">
    <img src="{{ asset('images/elevatis-sommet.jpg') }}" alt="" aria-hidden="true" loading="lazy" data-parallax="0.1"
         class="absolute inset-0 -z-20 size-full scale-110 object-cover object-[center_40%]">
    <div aria-hidden="true" class="absolute inset-0 -z-10 bg-gradient-to-r from-ink via-ink/75 to-brand-dark/30"></div>

    <div class="container-site py-28 lg:py-40">
        <div class="max-w-3xl" data-reveal>
            <p class="eyebrow text-mist!">{{ $eyebrow }}</p>
            <h2 class="display mt-5 text-5xl text-white italic sm:text-6xl lg:text-7xl">{{ $title }}</h2>
            <p class="mt-8 max-w-xl text-lg leading-relaxed text-white/75">{{ $text }}</p>
            <div class="mt-10 flex flex-wrap gap-4">
                <a href="{{ route('contact') }}" class="btn-light">
                    Prendre rendez-vous
                    <x-icon name="arrow-right" class="size-4" />
                </a>
                <a href="https://wa.me/{{ config('elevatis.contact.whatsapp') }}?text={{ rawurlencode(config('elevatis.contact.whatsapp_message')) }}"
                   target="_blank" rel="noopener" class="btn-ghost-light">
                    <x-icon name="whatsapp" class="size-4" />
                    Commencer via WhatsApp
                </a>
            </div>
        </div>
    </div>
</section>
