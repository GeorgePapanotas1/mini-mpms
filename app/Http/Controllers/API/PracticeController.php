<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\PracticeResource;
use App\Models\Practice;

class PracticeController extends Controller
{
    public function index(){
        return PracticeResource::collection(Practice::all());
    }
}
