@props([
    'eyebrow' => 'Agissez maintenant',
    'title' => 'Transformez votre vie dès aujourd’hui',
    'text' => 'Commencez par prendre de la hauteur : un premier échange suffit pour poser les bases de votre transformation.',
])

<section class="relative isolate overflow-hidden bg-ink">
    <img src="{{ asset('images/elevatis-sommet.jpg') }}" alt="" aria-hidden="true" loading="lazy"
         class="absolute inset-0 -z-10 size-full object-cover object-[center_40%]">
    <div aria-hidden="true" class="absolute inset-0 -z-10 bg-gradient-to-r from-ink via-ink/80 to-brand-dark/20"></div>

    <div class="container-site py-24 lg:py-32">
        <div class="max-w-2xl" data-reveal>
            <p class="eyebrow text-mist!">{{ $eyebrow }}</p>
            <h2 class="mt-4 text-4xl leading-tight font-semibold text-white! sm:text-5xl">{{ $title }}</h2>
            <p class="mt-6 text-lg leading-relaxed text-white/75">{{ $text }}</p>
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
