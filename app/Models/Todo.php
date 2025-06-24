<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Todo extends Model
{
    /**
     * The attributes that are mass assignable.
     * 
     * @var array<int, string>
     */
    protected $fillable = [
        'title', 
        'description',
        'category_id', 
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
}
