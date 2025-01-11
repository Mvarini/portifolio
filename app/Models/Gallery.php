<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Gallery extends Model
{
    protected $table = 'project_galleries';

    protected $fillable = [
        'project_id',
        'image'
    ];

    public function project(): BelongsTo
    {
        return $this->belongsTo(Project::class);
    }
}
