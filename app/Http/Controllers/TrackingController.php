<?php

namespace App\Http\Controllers;

use App\Models\ClickEvent;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class TrackingController extends Controller
{
    public function whatsapp(Request $request): RedirectResponse
    {
        $this->logClick('whatsapp', $request);

        $number = config('site.whatsapp_number_international');
        $message = urlencode(config('site.whatsapp_default_message'));

        return redirect()->away("https://api.whatsapp.com/send?phone={$number}&text={$message}");
    }

    public function call(Request $request): RedirectResponse
    {
        $this->logClick('call', $request);

        $phone = config('site.phone');
        $countryCode = config('site.country_code');
        
        // Convert local format to international
        $internationalPhone = $countryCode . ltrim($phone, '0');

        return redirect()->away("tel:+{$internationalPhone}");
    }

    protected function logClick(string $type, Request $request): void
    {
        ClickEvent::create([
            'type' => $type,
            'page' => $request->header('Referer') ?? $request->input('page', '/'),
            'referrer' => $request->header('Referer'),
            'ip' => $request->ip(),
            'user_agent' => substr($request->userAgent() ?? '', 0, 512),
        ]);
    }
}
