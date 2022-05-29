<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
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

    protected function image(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => $value ? asset("storage/$value") : asset("storage/image.png")
        );
    }
}
