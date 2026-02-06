<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContactMessage extends Model
{
    protected $fillable = [
        'name',
        'phone',
        'service_slug',
        'area_slug',
        'message',
        'ip',
        'user_agent',
    ];
}

