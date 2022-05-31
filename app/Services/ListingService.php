<?php

namespace App\Services;

use App\Models\Field;
use App\Models\Practice;

class ListingService
{
    public function getPractices() {
        return Practice::with('fields')->withCount('employees')->latest()->paginate(10);
    }

    public function getFields() {
        return Field::orderBy('id', 'asc')->get();
    }
}
