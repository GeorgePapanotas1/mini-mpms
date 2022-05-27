<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Field extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    public $timestamps = false;

    public function practice() {
        return $this->belongsToMany(Practice::class);
    }
}
