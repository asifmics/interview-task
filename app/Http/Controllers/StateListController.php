<?php

namespace App\Http\Controllers;

use App\Models\State;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class StateListController extends Controller
{
    public function __invoke(): JsonResponse
    {
        $states = State::with('country')->latest()->get();
        return response()->json($states);
    }
}
