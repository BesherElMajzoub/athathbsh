@props(['services'])

@php
    $routeMap = [
        'buy-used-furniture' => 'services.furniture',
        'buy-air-conditioners' => 'services.ac',
        'buy-restaurant-equipment' => 'services.restaurant',
        'buy-used-kitchens' => 'services.kitchens',
        'buy-used-appliances' => 'services.appliances',
    ];
@endphp

<div class="service-grid">
    @foreach ($services as $slug => $service)
        @if (is_array($service) && isset($service['name']))
            <a href="{{ route($routeMap[$slug] ?? 'services.index') }}" class="service-card">
                <h3>{{ $service['name'] }}</h3>
                <p>{{ \Illuminate\Support\Str::limit($service['excerpt'] ?? '', 100) }}</p>
                <span class="card-link">اعرف المزيد ←</span>
            </a>
        @endif
    @endforeach
</div>
