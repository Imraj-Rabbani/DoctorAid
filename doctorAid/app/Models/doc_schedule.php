<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class doc_schedule extends Model
{
    use HasFactory;
    protected $fillable = [
        'doc_id',
        'day',
        'time',
        'fees',
    ];
}
