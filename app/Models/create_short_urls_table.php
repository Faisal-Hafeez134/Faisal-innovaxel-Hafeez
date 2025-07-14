<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class create_short_urls_table extends Model
{
    protected $fillable = [
        'original_url',
        'short_code',
        'access_count',
    ];
}
