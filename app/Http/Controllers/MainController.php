<?php

namespace App\Http\Controllers;

use App\Services\ListingService;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index(ListingService $listingService) {
        $with["practices"] = $listingService->getPractices();
        return view('dashboard', $with);
    }
}
