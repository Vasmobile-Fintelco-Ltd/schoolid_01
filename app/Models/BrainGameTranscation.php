<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BrainGameTranscation extends Model
{
    use HasUuids, HasFactory;

    protected $fillabe = [
        'student_id',
        'amount',
        '20_centi',
        '15_centi',
        'trans_id',
        '5_centi'
    ];
}
