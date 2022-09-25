<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class clinic extends Model
{
    use HasFactory;

    protected $fillable = [
        'time_start',
        'time_end',
        'clinic_name',
    ];
}
