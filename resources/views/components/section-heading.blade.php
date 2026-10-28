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
        'mt-4 text-3xl leading-tight font-semibold sm:text-4xl lg:text-[2.75rem]',
        'text-white!' => $light,
    ])>{{ $title }}</h2>
    @if ($intro)
        <p @class(['mt-5 text-lg leading-relaxed', 'text-white/75' => $light])>{{ $intro }}</p>
    @endif
</div>
