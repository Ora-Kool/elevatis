@props([
    'eyebrow' => null,
    'title',
    'intro' => null,
    'align' => 'center',
    'light' => false,
])

<div {{ $attributes->class([
    'max-w-3xl',
    'mx-auto text-center' => $align === 'center',
]) }} data-reveal>
    @if ($eyebrow)
        <p @class(['eyebrow', 'justify-center' => $align === 'center', 'text-mist!' => $light])>{{ $eyebrow }}</p>
    @endif
    <h2 @class([
        'display mt-5 text-4xl italic sm:text-5xl lg:text-6xl',
        'text-white!' => $light,
    ])>{{ $title }}</h2>
    @if ($intro)
        <p @class(['mt-6 text-lg leading-relaxed', 'text-white/70' => $light])>{{ $intro }}</p>
    @endif
</div>
