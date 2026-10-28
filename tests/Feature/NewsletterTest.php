<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class NewsletterTest extends TestCase
{
    use RefreshDatabase;

    public function test_a_visitor_can_subscribe(): void
    {
        $this->from('/')
            ->post('/newsletter', ['email' => 'Lecteur@Example.com'])
            ->assertRedirect(url('/').'#newsletter')
            ->assertSessionHas('newsletter_success');

        $this->assertDatabaseHas('newsletter_subscribers', ['email' => 'lecteur@example.com']);
    }

    public function test_subscribing_twice_does_not_duplicate(): void
    {
        $this->post('/newsletter', ['email' => 'lecteur@example.com']);
        $this->post('/newsletter', ['email' => 'lecteur@example.com']);

        $this->assertDatabaseCount('newsletter_subscribers', 1);
    }

    public function test_invalid_email_is_rejected(): void
    {
        $this->from('/')
            ->post('/newsletter', ['email' => 'invalide'])
            ->assertSessionHasErrorsIn('newsletter', 'email');

        $this->assertDatabaseCount('newsletter_subscribers', 0);
    }
}
