@props([
    'whatsappText' => '',
    'callLabel' => 'اتصل الآن',
    'whatsappLabel' => 'واتساب',
    'size' => 'lg',
])

@php
    $sizeClass = $size === 'sm' ? 'btn-sm' : ($size === 'lg' ? 'btn-lg' : '');
@endphp

<div class="cta-row">
    <a class="btn btn-primary {{ $sizeClass }}" href="{{ $business['tel_uri'] }}">{{ $callLabel }}</a>
    <a class="btn btn-outline {{ $sizeClass }}" href="{{ \App\Support\Business::whatsappLink($whatsappText) }}">{{ $whatsappLabel }}</a>
</div>

