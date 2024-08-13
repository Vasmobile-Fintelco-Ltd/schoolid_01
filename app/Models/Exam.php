<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Exam extends Model
{
    use HasUuids, HasFactory;
    protected $fillable = [
        'teacher_id',
        'subject_id',
        'start_date',
        'end_date',
    ];

    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }

    public  function questions() : HasMany
    {
        return $this->hasMany(Question::class);
    }
    //this can be used only to diuspaly the other question without braing game 
    // public  function questionsExams() : HasMany
    // {
    //     return $this->hasMany(Question::class)->where('levelquestion', '!=' ,'brain_game');
    // }


    public function teachers(): BelongsTo
    {
        return $this->belongsTo( Teacher::class);
    }

    public function results(): HasMany
    {
        return $this->hasMany(Result::class);
    }
}
