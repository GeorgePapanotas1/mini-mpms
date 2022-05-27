<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Practice extends Model
{
    use HasFactory;

    protected $guarded = ["id"];

    public function employees() {
        return $this->hasMany(Employee::class);
    }

    public function fields() {
        return $this->belongsToMany(Field::class)->withTimestamps();
    }
}
