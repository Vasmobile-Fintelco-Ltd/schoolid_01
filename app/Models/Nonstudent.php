<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Nonstudent extends Model
{
    use HasUuids, HasFactory;

    protected $fillable  =[
        'user_id',
        'brain_game_status',
        'phone_number',
    ];

    public function students(): HasMany
    {
        return $this->hasMany(Student::class);
    }

    public function invoices(): HasMany
    {
        return $this->hasMany(Invoice::class);
    }

    public function user()
    {
    return $this->belongsTo(User::class);
    }

}
