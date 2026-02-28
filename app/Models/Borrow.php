<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Borrow extends Model
{
    protected $fillable = ['book_id', 'user_id', 'borrow_date', 'due_date', 'return_date'];

    public function user()
    {
        return $this->BelongsTo(User::class, 'user_id');
    }
    public function book()
    {
        return $this->BelongsTo(Book::class, 'book_id');
    }
}
