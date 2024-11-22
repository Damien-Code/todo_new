<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    use HasFactory;
    protected $fillable = [
        'task',
        'user_id',
        'category_id',
        'completed'
    ];
    public function category() {
        return $this->belongsTo(Category::class);
    }
}
