<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\Attributes\DataProvider;
use Tests\TestCase;

class PagesTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @return array<string, array{string, string}>
     */
    public static function pages(): array
    {
        return [
            'accueil' => ['/', 'Découvrez votre potentiel avec'],
            'à propos' => ['/a-propos', 'Révélez votre plein potentiel avec Elevatis'],
            'services' => ['/services', 'Votre partenaire pour une vie épanouissante et significative'],
            'tarifs' => ['/tarifs', 'Plan Essentiel'],
            'témoignages' => ['/temoignages', 'Sophie L.'],
            'contact' => ['/contact', 'Envoyez-nous un message'],
        ];
    }

    #[DataProvider('pages')]
    public function test_static_pages_render(string $uri, string $expected): void
    {
        $this->get($uri)
            ->assertOk()
            ->assertSee($expected)
            ->assertSee('contact@elevatis.net')
            ->assertSee('images/elevatis-logo.png');
    }

    public function test_contact_page_preselects_subject_from_query(): void
    {
        $this->get('/contact?sujet=essentiel')
            ->assertOk()
            ->assertSee('<option value="essentiel" selected', false);
    }

    public function test_sitemap_lists_static_pages(): void
    {
        $this->get('/sitemap.xml')
            ->assertOk()
            ->assertHeader('Content-Type', 'application/xml')
            ->assertSee(route('pricing'))
            ->assertSee(route('contact'));
    }

    /**
     * @return array<string, array{string, string}>
     */
    public static function legacyUrls(): array
    {
        return [
            'pricing' => ['/pricing', '/tarifs'],
            'reviews' => ['/reviews', '/temoignages'],
            'gallerie' => ['/gallerie', '/a-propos'],
            'publications' => ['/publications', '/'],
            'boutique' => ['/boutique', '/'],
            'category' => ['/category/pnl', '/'],
            'tag' => ['/tag/motivation', '/'],
            'article' => ['/lelevation-personnelle-la-cle-oubliee-de-la-reussite-durable', '/'],
        ];
    }

    #[DataProvider('legacyUrls')]
    public function test_legacy_wordpress_urls_redirect_permanently(string $from, string $to): void
    {
        $this->get($from)->assertMovedPermanently()->assertRedirect(url($to));
    }

    public function test_unknown_page_shows_branded_404(): void
    {
        $this->get('/page-inexistante')
            ->assertNotFound()
            ->assertSee('Retour à l’accueil');
    }
}
