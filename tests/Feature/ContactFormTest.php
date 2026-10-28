<?php

namespace Tests\Feature;

use App\Mail\ContactMessageReceived;
use App\Models\ContactMessage;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Mail;
use Tests\TestCase;

class ContactFormTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @return array<string, string>
     */
    private function validPayload(array $overrides = []): array
    {
        return [
            'first_name' => 'Awa',
            'last_name' => 'Ngono',
            'email' => 'awa@example.com',
            'phone' => '+237 600 00 00 00',
            'subject' => 'coaching',
            'message' => 'Bonjour, je souhaite démarrer un coaching de vie.',
            ...$overrides,
        ];
    }

    public function test_a_valid_message_is_stored_and_emailed(): void
    {
        Mail::fake();

        $this->post('/contact', $this->validPayload())
            ->assertRedirect(route('contact').'#formulaire')
            ->assertSessionHas('contact_success');

        $this->assertDatabaseHas('contact_messages', [
            'email' => 'awa@example.com',
            'subject' => 'Coaching de vie',
        ]);

        Mail::assertSent(ContactMessageReceived::class, function (ContactMessageReceived $mail) {
            return $mail->hasTo('contact@elevatis.net')
                && $mail->hasReplyTo('awa@example.com')
                && $mail->contactMessage->first_name === 'Awa';
        });
    }

    public function test_required_fields_are_validated(): void
    {
        Mail::fake();

        $this->from('/contact')
            ->post('/contact', [])
            ->assertRedirect('/contact')
            ->assertSessionHasErrors(['first_name', 'last_name', 'email', 'subject', 'message']);

        $this->assertDatabaseCount('contact_messages', 0);
        Mail::assertNothingSent();
    }

    public function test_unknown_subject_is_rejected(): void
    {
        $this->post('/contact', $this->validPayload(['subject' => 'spam']))
            ->assertSessionHasErrors('subject');
    }

    public function test_honeypot_blocks_bots(): void
    {
        Mail::fake();

        $this->post('/contact', $this->validPayload(['website' => 'https://spam.example']))
            ->assertSessionHasErrors('website');

        $this->assertSame(0, ContactMessage::count());
        Mail::assertNothingSent();
    }

    public function test_validation_errors_are_shown_in_french(): void
    {
        $this->from('/contact')
            ->followingRedirects()
            ->post('/contact', $this->validPayload(['email' => 'pas-un-email']))
            ->assertSee('Veuillez saisir une adresse e-mail valide.');
    }
}
