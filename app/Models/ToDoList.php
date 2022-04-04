<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ToDoList extends Model
{
    use HasFactory;

    protected $fillable = [
        "list_title",
        "description"
    ];

    protected static function booted()
    {
        static::deleting(function (ToDoList $list) {
            $list->listItems()->delete();
        });
    }

    public function listItems(): HasMany
    {
        return $this->hasMany(ListItem::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
