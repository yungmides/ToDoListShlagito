<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ListItem extends Model
{
    use HasFactory;

    protected $fillable = [
        "item_name",
        "item_content",
        "done"
    ];

    public function toDoList(): BelongsTo
    {
        return $this->belongsTo(ToDoList::class);
    }
}
