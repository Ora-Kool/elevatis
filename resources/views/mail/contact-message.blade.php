<x-mail::message>
# Nouveau message depuis le site

**Nom :** {{ $contactMessage->fullName() }}<br>
**E-mail :** {{ $contactMessage->email }}<br>
@if ($contactMessage->phone)
**Téléphone :** {{ $contactMessage->phone }}<br>
@endif
**Sujet :** {{ $contactMessage->subject }}

<x-mail::panel>
{{ $contactMessage->message }}
</x-mail::panel>

Répondez directement à cet e-mail pour contacter {{ $contactMessage->first_name }}.

{{ config('elevatis.name') }}
</x-mail::message>
