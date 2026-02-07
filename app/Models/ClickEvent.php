<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ClickEvent extends Model
{
    protected $fillable = [
        'type',
        'page',
        'referrer',
        'ip',
        'user_agent',
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function scopeWhatsapp($query)
    {
        return $query->where('type', 'whatsapp');
    }

    public function scopeCall($query)
    {
        return $query->where('type', 'call');
    }

    public function scopeToday($query)
    {
        return $query->whereDate('created_at', today());
    }

    public function scopeLastSevenDays($query)
    {
        return $query->where('created_at', '>=', now()->subDays(7));
    }

    public function getTypeArabicAttribute(): string
    {
        return match ($this->type) {
            'whatsapp' => 'واتساب',
            'call' => 'اتصال',
            default => $this->type,
        };
    }
}
