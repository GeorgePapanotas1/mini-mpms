<?php

namespace App\Services;

use App\Models\Practice;

class ListingService
{
    public function getPractices() {
        return Practice::with('fields')->withCount('employees')->latest()->get();
    }
}
