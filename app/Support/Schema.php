<?php

namespace App\Support;

class Schema
{
    /**
     * @param  array<string, mixed>  $business
     * @return array<string, mixed>
     */
    public static function localBusiness(array $business): array
    {
        $schema = [
            '@context' => 'https://schema.org',
            '@type' => 'LocalBusiness',
            'name' => (string) ($business['brand_name'] ?? ''),
            'url' => rtrim((string) config('app.url'), '/'),
            'telephone' => self::telephoneE164($business),
            'areaServed' => [
                [
                    '@type' => 'City',
                    'name' => (string) ($business['city'] ?? ''),
                ],
            ],
            'address' => [
                '@type' => 'PostalAddress',
                'addressLocality' => (string) ($business['city'] ?? ''),
                'addressCountry' => 'SA',
                'streetAddress' => (string) ($business['address_ar'] ?? ''),
            ],
        ];

        $mapUrl = (string) ($business['map_url'] ?? '');
        if ($mapUrl !== '') {
            $schema['hasMap'] = $mapUrl;
        }

        return $schema;
    }

    /**
     * @param  array<string, mixed>  $business
     * @param  array<string, mixed>  $service
     * @param  array<string, string>  $vars
     * @return array<string, mixed>
     */
    public static function service(array $business, array $service, array $vars): array
    {
        $provider = [
            '@type' => 'LocalBusiness',
            'name' => (string) ($vars['brand'] ?? ($business['brand_name'] ?? '')),
            'url' => rtrim((string) config('app.url'), '/'),
            'telephone' => self::telephoneE164($business),
            'areaServed' => [
                [
                    '@type' => 'City',
                    'name' => (string) ($vars['city'] ?? ($business['city'] ?? '')),
                ],
            ],
        ];

        $schema = [
            '@context' => 'https://schema.org',
            '@type' => 'Service',
            'name' => Template::render((string) ($service['name'] ?? ''), $vars),
            'serviceType' => Template::render((string) ($service['name'] ?? ''), $vars),
            'areaServed' => [
                [
                    '@type' => 'City',
                    'name' => (string) ($vars['city'] ?? ($business['city'] ?? '')),
                ],
            ],
            'provider' => $provider,
        ];

        return $schema;
    }

    /**
     * @param  array<int, array{q?: string, a?: string}>  $faqs
     * @param  array<string, string>  $vars
     * @return array<string, mixed>
     */
    public static function faqPage(array $faqs, array $vars = []): array
    {
        $entities = [];

        foreach ($faqs as $item) {
            $question = Template::render((string) ($item['q'] ?? ''), $vars);
            $answer = Template::render((string) ($item['a'] ?? ''), $vars);

            if ($question === '' || $answer === '') {
                continue;
            }

            $entities[] = [
                '@type' => 'Question',
                'name' => $question,
                'acceptedAnswer' => [
                    '@type' => 'Answer',
                    'text' => $answer,
                ],
            ];
        }

        return [
            '@context' => 'https://schema.org',
            '@type' => 'FAQPage',
            'mainEntity' => $entities,
        ];
    }

    /**
     * @return array<string, mixed>
     */
    public static function videoObject(string $name, string $description, string $uploadDate, string $thumbnailUrl, string $contentUrl): array
    {
        return [
            '@context' => 'https://schema.org',
            '@type' => 'VideoObject',
            'name' => $name,
            'description' => $description,
            'thumbnailUrl' => $thumbnailUrl,
            'uploadDate' => $uploadDate,
            'contentUrl' => $contentUrl,
            'embedUrl' => str_replace('watch?v=', 'embed/', $contentUrl),
        ];
    }

    /**
     * @param  array<string, mixed>  $business
     */
    private static function telephoneE164(array $business): string
    {
        $e164 = (string) ($business['phone_e164'] ?? '');
        if ($e164 !== '') {
            return '+'.$e164;
        }

        return (string) ($business['phone'] ?? '');
    }
}

