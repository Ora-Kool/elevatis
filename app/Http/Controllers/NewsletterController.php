<?php

namespace App\Http\Controllers;

use App\Models\NewsletterSubscriber;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class NewsletterController extends Controller
{
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validateWithBag('newsletter', [
            'email' => ['required', 'email', 'max:255'],
            'website' => ['prohibited'],
        ], [
            'email.required' => 'Veuillez saisir votre adresse e-mail.',
            'email.email' => 'Veuillez saisir une adresse e-mail valide.',
            'website.prohibited' => 'Votre inscription n’a pas pu être enregistrée.',
        ]);

        NewsletterSubscriber::firstOrCreate(
            ['email' => strtolower($validated['email'])],
            ['ip_address' => $request->ip()],
        );

        return back()
            ->withFragment('newsletter')
            ->with('newsletter_success', 'Merci ! Vous recevrez bientôt nos conseils exclusifs.');
    }
}
