<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Book extends Model
{
    protected $fillable = ['name', 'title', 'category_id', 'quantity'];

    public function category()
    {
        return $this->BelongsTo(Category::class, 'category_id');
    }
    public function borrows()
    {
        return $this->hasMany(Borrow::class);
    }
}
