@php
    $serviceName = $contactMessage->service_slug ? (config('services')[$contactMessage->service_slug]['name'] ?? $contactMessage->service_slug) : null;
    $areaName = $contactMessage->area_slug ? (config('areas.canonicals')[$contactMessage->area_slug]['name'] ?? $contactMessage->area_slug) : null;
@endphp

رسالة جديدة من نموذج التواصل

الاسم: {{ $contactMessage->name ?: '-' }}
الجوال: {{ $contactMessage->phone }}
الخدمة: {{ $serviceName ?: '-' }}
الحي: {{ $areaName ?: '-' }}
الرسالة:
{{ $contactMessage->message ?: '-' }}

الوقت: {{ $contactMessage->created_at }}
IP: {{ $contactMessage->ip ?: '-' }}
User Agent: {{ $contactMessage->user_agent ?: '-' }}

