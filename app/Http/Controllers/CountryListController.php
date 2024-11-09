<?php

namespace App\Http\Controllers;

use App\Models\Country;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CountryListController extends Controller
{
    public function __invoke(): JsonResponse
    {
        $countries = Country::latest()->get();
        return response()->json($countries);
    }
}
