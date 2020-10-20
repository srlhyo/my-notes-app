<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;

class Note extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $attributes = [
        'content' => ''
    ];

    public function categories() {
        return $this->belongsToMany('App\Models\Category', 'categories_notes');
    }
}
