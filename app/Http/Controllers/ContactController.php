<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Mail\ContactMessageReceived;
use App\Models\ContactMessage;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\View\View;
use Throwable;

class ContactController extends Controller
{
    public function create(Request $request): View
    {
        $subjects = config('elevatis.contact_subjects');
        $selected = array_key_exists($request->query('sujet'), $subjects) ? $request->query('sujet') : null;

        return view('pages.contact', compact('subjects', 'selected'));
    }

    public function store(ContactRequest $request): RedirectResponse
    {
        $data = $request->safe()->except('website');
        $data['subject'] = config('elevatis.contact_subjects')[$data['subject']];

        $contactMessage = ContactMessage::create([
            ...$data,
            'ip_address' => $request->ip(),
        ]);

        try {
            Mail::to(config('elevatis.contact_recipient'))->send(new ContactMessageReceived($contactMessage));
        } catch (Throwable $e) {
            Log::error('Contact message mail failed', ['id' => $contactMessage->id, 'error' => $e->getMessage()]);
        }

        return redirect()
            ->to(route('contact').'#formulaire')
            ->with('contact_success', 'Merci '.$contactMessage->first_name.' ! Votre message a bien été envoyé. Nous vous répondrons dans les plus brefs délais.');
    }
}
