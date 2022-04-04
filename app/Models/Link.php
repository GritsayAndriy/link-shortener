<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Link extends Model
{
    use HasFactory;

    protected $fillable = [
        'url', 'token', 'max_redirect', 'end_life'
    ];

    protected $casts = [
        'end_life' => 'datetime'
    ];
}
