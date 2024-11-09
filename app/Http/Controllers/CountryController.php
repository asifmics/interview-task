<?php

namespace App\Http\Controllers;

use App\Actions\CountryCreateAction;
use App\Actions\CountryDeleteAction;
use App\Actions\CountryUpdateAction;
use App\Http\Requests\CountryStoreRequest;
use App\Http\Requests\CountryUpdateReuest;
use App\Models\Country;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('country.index');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CountryStoreRequest $request): JsonResponse
    {
        Country::create($request->validated());
        return response()->json(['status' => 200]);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(CountryUpdateReuest $request, Country $country): JsonResponse
    {
        $country->update($request->validated());

        return response()->json(['status' => 200]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Country $country): JsonResponse
    {
        $country->delete();
        return response()->json([
            'status' => true,
            'message' => "Country deleted successfully",
        ]);
    }


}
