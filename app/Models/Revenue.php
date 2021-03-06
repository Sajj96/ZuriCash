<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Revenue extends Model
{
    use HasFactory;

    const TYPE_TRIVIA_QUESTION = "questions";
    const TYPE_WHATSAPP = "whatsapp";
    const TYPE_VIDEO = "video";
    const TYPE_ADCLICK = "ads";
    const STATUS_PAID = 1;
    const STATUS_PENDING = 0;
}
