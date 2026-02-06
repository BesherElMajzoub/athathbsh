<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreContactMessageRequest;
use App\Mail\ContactMessageReceived;
use App\Models\ContactMessage;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Mail;
use Illuminate\View\View;

class ContactController extends Controller
{
    public function show(): View
    {
        $business = config('business');

        $seo = [
            'title' => "تواصل معنا | رقم شراء الأثاث المستعمل {$business['city']} (اتصال/واتساب) — {$business['brand_name']}",
            'description' => "اتصل الآن أو راسل واتساب لشراء الأثاث المستعمل {$business['city']}. نموذج تواصل سريع + ساعات العمل + رد سريع.",
        ];

        return view('pages.contact', [
            'seo' => $seo,
            'services' => config('services', []),
            'areas' => config('areas.canonicals', []),
        ]);
    }

    public function store(StoreContactMessageRequest $request): RedirectResponse
    {
        // Honeypot: treat as success to avoid giving signals to bots.
        if ((string) $request->input('website') !== '') {
            return back()->with('contact_success', true);
        }

        $phoneDigits = preg_replace('/\\D+/', '', (string) $request->input('phone')) ?? '';

        $message = ContactMessage::create([
            'name' => $request->input('name'),
            'phone' => $phoneDigits !== '' ? $phoneDigits : (string) $request->input('phone'),
            'service_slug' => $request->input('service_slug'),
            'area_slug' => $request->input('area_slug'),
            'message' => $request->input('message'),
            'ip' => $request->ip(),
            'user_agent' => (string) $request->userAgent(),
        ]);

        $leadsEmail = (string) config('business.leads_email');
        if ($leadsEmail !== '') {
            try {
                Mail::to($leadsEmail)->send(new ContactMessageReceived($message));
            } catch (\Throwable) {
                // If mail isn't configured, we still store the lead and show success.
            }
        }

        return back()->with('contact_success', true);
    }
}
