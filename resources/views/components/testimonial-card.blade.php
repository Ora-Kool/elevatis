@props(['testimonial'])

<figure {{ $attributes->class(['card flex h-full flex-col hover:-translate-y-1 hover:shadow-lift']) }}>
    <div class="flex items-center justify-between">
        <x-icon name="quote" class="size-9 text-mist" />
        <div class="flex gap-0.5 text-brand" aria-label="5 étoiles sur 5">
            @for ($i = 0; $i < 5; $i++)
                <x-icon name="star" class="size-4" />
            @endfor
        </div>
    </div>

    <blockquote class="mt-6 flex-1 text-lg leading-relaxed text-ink">
        «&nbsp;{{ $testimonial['quote'] }}&nbsp;»
    </blockquote>

    <figcaption class="mt-8 flex items-center gap-4 border-t border-ink/5 pt-6">
        <span class="flex size-12 items-center justify-center rounded-full bg-brand font-semibold text-white">
            {{ mb_substr($testimonial['name'], 0, 1) }}
        </span>
        <span>
            <span class="block font-semibold text-ink">{{ $testimonial['name'] }}</span>
            @if ($testimonial['role'])
                <span class="block text-sm">{{ $testimonial['role'] }}</span>
            @endif
        </span>
    </figcaption>
</figure>
