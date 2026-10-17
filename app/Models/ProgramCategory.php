<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ProgramCategory extends Model
{
    protected $fillable = ['slug', 'name', 'description', 'sort'];

    protected $casts = ['name' => 'array', 'description' => 'array'];

    public function programs(): HasMany
    {
        return $this->hasMany(TrainingProgram::class);
    }
}
