<x-layouts.app
    title="Témoignages"
    description="Découvrez ce que nos clients disent de leur expérience de coaching de vie avec Elevatis.">

    <x-page-hero
        eyebrow="Témoignages"
        title="Ce qu’ils disent d’Elevatis"
        intro="Découvrez ce que nos clients satisfaits ont à dire sur leur expérience avec Elevatis." />

    <section class="section bg-white">
        <div class="container-site">
            @php $testimonials = config('elevatis.testimonials'); @endphp

            <figure class="relative mx-auto max-w-4xl text-center" data-reveal>
                <span class="display text-8xl leading-none text-brand/15 italic">“</span>
                <blockquote class="display mt-4 text-3xl leading-snug text-ink italic sm:text-4xl lg:text-5xl">
                    «&nbsp;{{ $testimonials[0]['quote'] }}&nbsp;»
                </blockquote>
                <figcaption class="mt-10 flex items-center justify-center gap-4">
                    <span class="flex size-14 items-center justify-center rounded-full bg-brand text-lg font-semibold text-white">
                        {{ mb_substr($testimonials[0]['name'], 0, 1) }}
                    </span>
                    <span class="text-left">
                        <span class="block font-semibold text-ink">{{ $testimonials[0]['name'] }}</span>
                        <span class="block text-sm">{{ $testimonials[0]['role'] }}</span>
                    </span>
                </figcaption>
            </figure>

            <div class="mx-auto mt-24 grid max-w-5xl gap-6 md:grid-cols-2">
                @foreach (array_slice($testimonials, 1) as $testimonial)
                    <x-testimonial-card :testimonial="$testimonial" data-reveal style="--reveal-delay: {{ $loop->index * 100 }}ms" />
                @endforeach
            </div>
        </div>
    </section>

    <section class="grain relative overflow-hidden bg-ink py-24 text-white lg:py-32">
        <div class="container-site">
            <x-section-heading light eyebrow="Des résultats concrets" title="Elevatis transforme des vies" />
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

    <x-newsletter />

    <x-cta-band title="Et si votre histoire était la prochaine ?" />
</x-layouts.app>
