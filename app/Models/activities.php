<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class activities extends Model
{
    use HasFactory;
    protected $table = 'activities';
    protected $fillable = [
        'teatcher_id',
        'discipline_id',
        'name',
        'filepath',
        'description',
    ];
    
    public function teacher()
    {
        return $this->belongsTo(teachers::class, 'teatcher_id', 'id');
    }
    public function discipline()
    {
        return $this->belongsTo(disciplines::class, 'discipline_id', 'id');
    }
    public function atividadeRes()
    {
        return $this->hasMany(activities_responses::class, 'activity_id', 'id');
    }
}
