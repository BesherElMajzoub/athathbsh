<?php

namespace App\Support;

class Business
{
    public static function data(): array
    {
        $config = config('business');

        $phone = (string) ($config['phone'] ?? '');
        $whatsapp = (string) ($config['whatsapp'] ?? $phone);
        $countryCode = (string) ($config['country_code'] ?? '966');

        $phoneE164 = self::toE164($phone, $countryCode);
        $whatsappE164 = self::toE164($whatsapp, $countryCode);

        return [
            ...$config,
            'phone_digits' => self::digits($phone),
            'phone_e164' => $phoneE164,
            'tel_uri' => self::telUri($phoneE164),
            'whatsapp_e164' => $whatsappE164,
            'whatsapp_uri' => self::whatsappUri($whatsappE164),
        ];
    }

    public static function whatsappLink(?string $text = null): string
    {
        $business = self::data();
        $uri = $business['whatsapp_uri'] ?? '';

        if ($text === null || $text === '') {
            return $uri;
        }

        return $uri.'?text='.rawurlencode($text);
    }

    private static function telUri(string $phoneE164): string
    {
        if ($phoneE164 === '') {
            return 'tel:';
        }

        // `tel:` supports `+` prefix.
        return 'tel:+'.$phoneE164;
    }

    private static function whatsappUri(string $phoneE164): string
    {
        if ($phoneE164 === '') {
            return 'https://wa.me/';
        }

        return 'https://wa.me/'.$phoneE164;
    }

    private static function toE164(string $phone, string $countryCode): string
    {
        $digits = self::digits($phone);
        $countryDigits = self::digits($countryCode);

        if ($digits === '') {
            return '';
        }

        // If number already includes country code (966...), keep it.
        if ($countryDigits !== '' && str_starts_with($digits, $countryDigits)) {
            return $digits;
        }

        // Saudi mobile common forms:
        // - 05XXXXXXXX (10 digits)
        // - 5XXXXXXXX (9 digits)
        if (strlen($digits) === 10 && str_starts_with($digits, '0')) {
            return $countryDigits.substr($digits, 1);
        }

        if (strlen($digits) === 9 && str_starts_with($digits, '5')) {
            return $countryDigits.$digits;
        }

        // Fallback: prefix country if we can.
        if ($countryDigits !== '') {
            return $countryDigits.$digits;
        }

        return $digits;
    }

    private static function digits(string $value): string
    {
        return preg_replace('/\D+/', '', $value) ?? '';
    }
}

