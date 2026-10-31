@props(['testimonial'])

<figure {{ $attributes->class(['flex h-full flex-col border border-ink/8 bg-white p-8 sm:p-10']) }}>
    <div class="flex items-center justify-between">
        <span class="display text-5xl leading-none text-brand/25 italic">“</span>
        <div class="flex gap-0.5 text-brand" aria-label="5 étoiles sur 5">
            @for ($i = 0; $i < 5; $i++)
                <x-icon name="star" class="size-3.5" />
            @endfor
        </div>
    </div>

    <blockquote class="display mt-4 flex-1 text-2xl leading-snug text-ink italic">
        «&nbsp;{{ $testimonial['quote'] }}&nbsp;»
    </blockquote>

    <figcaption class="mt-8 flex items-center gap-4 border-t border-ink/8 pt-6">
        <span class="flex size-11 items-center justify-center rounded-full bg-brand font-semibold text-white">
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
