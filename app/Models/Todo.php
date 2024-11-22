<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    //
    protected $fillable = [
        'task',
        'user_id',
        'category_id'
    ];
    public function category() {
        return $this->belongsTo(Category::class);
    }
}
