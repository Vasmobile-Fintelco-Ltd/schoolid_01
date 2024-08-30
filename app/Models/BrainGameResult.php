<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BrainGameResult extends Model
{
    use HasUuids, HasFactory;
    protected $fillable  = [
        'user_id',
        'name',
        'yes_ans',
        'no_ans',
        'result_json',
        'marks_obtained',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
