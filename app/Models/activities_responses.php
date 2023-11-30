<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class activities_responses extends Model
{
    use HasFactory;
    protected $table = 'activities_responses';
    protected $fillable = [
        'activity_id',
        'student_id',
        'check',
        'note',
        'filepath',
        'description',
    ];

    public function atividade()
    {
        return $this->belongsTo(activities::class, 'activity_id', 'id');
    }
    public function estudante()
    {
        return $this->belongsTo(students::class, 'student_id', 'id');
    }
}
