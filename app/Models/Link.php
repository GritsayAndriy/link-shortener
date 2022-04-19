<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Link extends Model
{
    use HasFactory;

    protected $fillable = [
        'url', 'token', 'max_redirect', 'expired_at'
    ];

    protected $casts = [
        'end_life' => 'datetime'
    ];
}
