@props([
    'faqs' => [],
    'vars' => [],
])

@php
    $vars = array_merge(['brand' => $business['brand_name'], 'city' => $business['city']], $vars);
@endphp

<div class="faq">
    @foreach ($faqs as $item)
        @php
            $question = \App\Support\Template::render((string) ($item['q'] ?? ''), $vars);
            $answer = \App\Support\Template::render((string) ($item['a'] ?? ''), $vars);
        @endphp
        <details class="faq-item">
            <summary class="faq-q">{{ $question }}</summary>
            <div class="faq-a">
                <p>{{ $answer }}</p>
            </div>
        </details>
    @endforeach
</div>

