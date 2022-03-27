<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Campaign extends Model
{
    use HasFactory;

    const STATUS_INPROGRESS = 0;
    const STATUS_COMPLETED = 1;
}
