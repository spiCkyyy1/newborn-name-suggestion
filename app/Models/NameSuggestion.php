<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class NameSuggestion extends Model
{
    use HasFactory, SoftDeletes;


    protected $fillable = [
        'family_member_name',
        'relation',
        'boy_name',
        'girl_name',
        'submitted_at',
    ];


    protected $casts = [
        'submitted_at' => 'datetime',
    ];
}
