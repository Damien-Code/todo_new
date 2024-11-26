<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'user_id',
        'category',
        'color'
    ];

    public function todos() {
        return $this->hasMany(Todo::Class);
    }

    public function users()
    {
        return $this->belongsTo(User::class);
    }
}
