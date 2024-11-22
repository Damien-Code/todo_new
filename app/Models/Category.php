<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'category'
    ];

    public function todos() {
        return $this->hasMany(Todo::Class);
    }
}
