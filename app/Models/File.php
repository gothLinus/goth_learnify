<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class File extends Model
{
    protected $fillable = [
        'name',
        'path',
        'card_id'
    ];

    protected $appends = ['url'];

    public function card(): BelongsTo
    {
        return $this->belongsTo(Card::class);
    }

    public function getUrlAttribute()
    {
        return asset('storage/' . $this->path);
    }
}
