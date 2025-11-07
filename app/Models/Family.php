<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Family extends Model
{
    use SoftDeletes;

    protected $fillable = ['name', 'slug', 'access_code'];

    public function suggestions()
    {
        return $this->hasMany(NameSuggestion::class);
    }
}
