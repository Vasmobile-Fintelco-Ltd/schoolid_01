<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    use HasUuids, HasFactory;
    protected $fillable  = [        
        'question_type',
        'question',
        'option1',
        'option2',
        'option3',
        'option4',
        'answer',
        'image',
        'status',
    ];

   
}
