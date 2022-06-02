<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WhatsAppStatus extends Model
{
    use HasFactory;

    const STATUS_PUBLISHED = 1;
    const STATUS_PENDING = 0;
}
