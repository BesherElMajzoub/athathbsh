<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreContactMessageRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $services = array_keys(config('services', []));
        $areas = array_keys(config('areas.canonicals', []));

        return [
            'name' => ['nullable', 'string', 'max:120'],
            'phone' => ['required', 'string', 'max:32', 'regex:/^[0-9+\\-\\s()]{8,32}$/'],
            'service_slug' => ['nullable', 'string', 'max:120', 'in:'.implode(',', $services)],
            'area_slug' => ['nullable', 'string', 'max:120', 'in:'.implode(',', $areas)],
            'message' => ['nullable', 'string', 'max:2000'],

            // Honeypot: real users won't fill this field.
            'website' => ['nullable', 'string', 'max:120'],
        ];
    }
}
