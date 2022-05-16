<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Story extends Model
{
    use HasFactory;

    const STATUS_INPROGRESS = "In progress";
    const STATUS_COMPLETED = "Finished";
    const STATUS_CANCELLED = "Closed";

    const FEATURED = 1;
    const NOT_FEATURED = 2;
}
