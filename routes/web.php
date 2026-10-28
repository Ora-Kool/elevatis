<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\SitemapController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'pages.home')->name('home');
Route::view('/a-propos', 'pages.about')->name('about');
Route::view('/services', 'pages.services')->name('services');
Route::view('/tarifs', 'pages.pricing')->name('pricing');
Route::view('/temoignages', 'pages.testimonials')->name('testimonials');

Route::get('/contact', [ContactController::class, 'create'])->name('contact');
Route::post('/contact', [ContactController::class, 'store'])
    ->middleware('throttle:5,1')
    ->name('contact.store');

Route::post('/newsletter', [NewsletterController::class, 'store'])
    ->middleware('throttle:5,1')
    ->name('newsletter.store');

Route::get('/sitemap.xml', SitemapController::class)->name('sitemap');

Route::permanentRedirect('/pricing', '/tarifs');
Route::permanentRedirect('/reviews', '/temoignages');
Route::permanentRedirect('/gallerie', '/a-propos');

foreach (['publications', 'blog', 'boutique', 'panier', 'commander', 'checkout', 'mon-compte', 'my-account', 'compte-donateur'] as $legacy) {
    Route::permanentRedirect("/{$legacy}", '/');
}

Route::get('/{legacy}/{slug}', fn () => redirect()->route('home', status: 301))
    ->whereIn('legacy', ['category', 'tag', 'author'])
    ->where('slug', '.*');

Route::get('/{slug}', fn () => redirect()->route('home', status: 301))
    ->whereIn('slug', [
        'les-5-pieges-mentaux-qui-vous-empechent-de-prendre-de-la-hauteur-et-comment-les-eviter',
        'reprogrammez-votre-cerveau-avec-la-pnl-techniques-puissantes-pour-une-vie-epanouie',
        'cultivez-loptimisme-7-habitudes-inspirees-de-la-psychologie-positive',
        'ne-sacrifiez-pas-votre-sante-mentale-et-emotionnelle-pour-des-reussites-materielles-limportance-de-lequilibre-pour-une-satisfaction-plus-profonde',
        'les-efforts-deployes-pour-atteindre-le-succes-valent-ils-la-peine-si-cela-entraine-une-perte-de-sens-ou-de-connexion-avec-soi-meme-et-les-autres',
        'les-valeurs-fondamentales-un-guide-essentiel-pour-aligner-ses-objectifs-avec-son-essence',
        'lelevation-personnelle-la-cle-oubliee-de-la-reussite-durable',
    ]);
