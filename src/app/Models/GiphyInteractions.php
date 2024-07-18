<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GiphyInteractions extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'service', 'query', 'http_response', 'response', 'requester_ip'
    ];

    protected $casts = [
        'response' => 'array',
    ];
}
