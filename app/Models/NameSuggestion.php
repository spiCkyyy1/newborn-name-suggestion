<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class NameSuggestion extends Model
{
    use SoftDeletes;


    protected $fillable = [
        'family_member_name',
        'relation',
        'boy_name',
        'girl_name',
        'submitted_at',
        'family_id',
    ];


    protected $casts = [
        'submitted_at' => 'datetime',
    ];
    public function family()
    {
        return $this->belongsTo(Family::class);
    }
}
