<?php

return [

    'name' => 'Elevatis',

    'tagline' => 'Prenez de la hauteur',

    'description' => 'Elevatis, votre coach de vie à Douala : coaching personnalisé, formation et écoute active pour révéler votre plein potentiel et vivre une vie épanouie et pleine de sens.',

    'contact' => [
        'email' => 'contact@elevatis.net',
        'phone' => '+237 658 590 544',
        'phone_href' => '+237658590544',
        'whatsapp' => '237658590544',
        'whatsapp_message' => 'Bonjour Elevatis, je souhaite en savoir plus sur votre accompagnement.',
        'city' => 'Douala',
        'country' => 'Cameroun',
        'map_query' => 'Douala, Cameroun',
    ],

    'contact_recipient' => env('CONTACT_RECIPIENT', 'contact@elevatis.net'),

    'navigation' => [
        ['label' => 'Accueil', 'route' => 'home'],
        ['label' => 'À propos', 'route' => 'about'],
        ['label' => 'Services', 'route' => 'services'],
        ['label' => 'Tarifs', 'route' => 'pricing'],
        ['label' => 'Témoignages', 'route' => 'testimonials'],
        ['label' => 'Contact', 'route' => 'contact'],
    ],

    'stats' => [
        ['value' => 9800, 'suffix' => '+', 'label' => 'Séances de coaching de vie'],
        ['value' => 96, 'suffix' => '%', 'label' => 'Clients satisfaits'],
        ['value' => 97, 'suffix' => '%', 'label' => 'Accompagnement personnalisé'],
        ['value' => 98, 'suffix' => '%', 'label' => 'Découverte de soi'],
    ],

    'testimonials' => [
        [
            'quote' => 'Grâce au coaching de vie d’Elevatis, j’ai trouvé la clarté et la motivation pour atteindre mes objectifs.',
            'name' => 'Sophie L.',
            'role' => 'Commerçante',
        ],
        [
            'quote' => 'L’accompagnement personnalisé m’a permis de me découvrir et de progresser de manière significative. Merci Elevatis !',
            'name' => 'Thomas G.',
            'role' => 'Directeur Finances et Comptabilité',
        ],
        [
            'quote' => 'Elevatis m’a aidé à créer un environnement de confiance pour explorer mes aspirations profondes. Une expérience transformative !',
            'name' => 'Julie C.',
            'role' => null,
        ],
    ],

    'plans' => [
        [
            'slug' => 'essentiel',
            'name' => 'Plan Essentiel',
            'price' => '249 €',
            'period' => '/mois',
            'summary' => 'Pour un accompagnement de base',
            'features' => [
                'Séances de coaching régulières',
                'Suivi personnalisé',
                'Outils de développement personnel',
            ],
            'cta' => 'Commencer',
            'featured' => false,
        ],
        [
            'slug' => 'avance',
            'name' => 'Plan Avancé',
            'price' => 'Sur devis',
            'period' => null,
            'summary' => 'Pour une transformation profonde',
            'features' => [
                'Coaching intensif',
                'Accès illimité aux ressources',
                'Support 24/7',
            ],
            'cta' => 'Choisir ce plan',
            'featured' => true,
        ],
    ],

    'guide' => [
        'title' => 'Reprendre le pouvoir sur sa vie',
        'subtitle' => 'Un guide concret pour passer de la prise de conscience à l’action alignée.',
        'file' => 'downloads/reprendre-le-pouvoir-sur-sa-vie.pdf',
        'pages' => 17,
        'chapters' => [
            'Comprendre où vous en êtes',
            'Reprendre le pouvoir intérieur',
            'Passer à l’action alignée',
            'Ancrer le changement dans le sens',
        ],
    ],

    'contact_subjects' => [
        'coaching' => 'Coaching de vie',
        'formation' => 'Formation',
        'ecoute' => 'Écoute active',
        'essentiel' => 'Plan Essentiel',
        'avance' => 'Plan Avancé (devis)',
        'autre' => 'Autre demande',
    ],

];
