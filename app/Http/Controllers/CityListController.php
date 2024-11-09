<?php

namespace App\Http\Controllers;

use App\Models\City;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CityListController extends Controller
{
    public function __invoke(): JsonResponse
    {
        $cities = City::with('state')->latest()->get();
        return response()->json($cities);
    }
}
