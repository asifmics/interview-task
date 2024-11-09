<?php

namespace App\Http\Controllers;

use App\Actions\CityCreateAction;
use App\Actions\CityDeleteAction;
use App\Actions\CityUpdateAction;
use App\Actions\CountryDeleteAction;
use App\Http\Requests\CityStoreRequest;
use App\Http\Requests\CityUpdateRequest;
use App\Models\City;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CityController extends Controller
{
    public function index(): view
    {
        return view('city.index');
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(CityStoreRequest $request): JsonResponse
    {
        City::create($request->validated());
        return response()->json(['status' => 200]);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(CityUpdateRequest $request, City $city): JsonResponse
    {
        $city->update($request->validated());
        return response()->json(['status' => 200]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(City $city): JsonResponse
    {
        $city->delete();

        return response()->json([
            'status' => true,
            'message' => "City deleted successfully",
        ]);
    }

}
