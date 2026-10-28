<x-layouts.app
    title="Témoignages"
    description="Découvrez ce que nos clients disent de leur expérience de coaching de vie avec Elevatis.">

    <x-page-hero
        eyebrow="Témoignages"
        title="Ce qu’ils disent d’Elevatis"
        intro="Découvrez ce que nos clients satisfaits ont à dire sur leur expérience avec Elevatis." />

    <section class="section">
        <div class="container-site">
            @php $testimonials = config('elevatis.testimonials'); @endphp

            <figure class="relative mx-auto max-w-4xl text-center" data-reveal>
                <x-icon name="quote" class="mx-auto size-14 text-mist" />
                <blockquote class="mt-8 text-2xl leading-snug font-medium text-ink sm:text-3xl lg:text-4xl">
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

    <section class="section bg-cloud">
        <div class="container-site">
            <x-section-heading eyebrow="Des résultats concrets" title="Elevatis transforme des vies" />
            <dl class="mt-16 grid grid-cols-2 gap-5 lg:grid-cols-4">
                @foreach (config('elevatis.stats') as $stat)
                    <div class="rounded-3xl bg-white p-8 text-center shadow-soft" data-reveal style="--reveal-delay: {{ $loop->index * 100 }}ms">
                        <dd class="text-4xl font-semibold tracking-tight text-brand sm:text-5xl"
                            data-counter="{{ $stat['value'] }}" data-suffix="{{ $stat['suffix'] === '%' ? ' %' : $stat['suffix'] }}">
                            {{ number_format($stat['value'], 0, ',', ' ') }}{{ $stat['suffix'] === '%' ? ' %' : $stat['suffix'] }}
                        </dd>
                        <dt class="mt-3 text-sm">{{ $stat['label'] }}</dt>
                    </div>
                @endforeach
            </dl>
        </div>
    </section>

    <x-newsletter />

    <x-cta-band title="Et si votre histoire était la prochaine ?" />
</x-layouts.app>
