<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class disciplines extends Model
{
    use HasFactory;
    protected $table = 'disciplines';
    protected $fillable = [
        'name',
    ];

    public function activities()
    {
        return $this->hasMany(activities::class, 'discipline_id', 'id');
    }
}
