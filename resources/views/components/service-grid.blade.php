@props([
    'services' => [],
])

@php
    $vars = ['brand' => $business['brand_name'], 'city' => $business['city']];
@endphp

<div class="grid service-grid">
    @foreach ($services as $slug => $service)
        <a class="card service-card" href="{{ route('services.show', ['serviceSlug' => $slug]) }}">
            <div class="card-title">{{ $service['name'] }}</div>
            <div class="card-text">{{ \App\Support\Template::render((string) ($service['excerpt'] ?? ''), $vars) }}</div>
            <div class="card-link">التفاصيل</div>
        </a>
    @endforeach
</div>

