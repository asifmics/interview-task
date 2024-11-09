<?php

namespace App\Http\Controllers;

use App\Actions\StateCreateAction;
use App\Actions\StateDeleteAction;
use App\Actions\StateUpdateAction;
use App\Http\Requests\StateStoreRequest;
use App\Http\Requests\StateUpdateRequest;
use App\Models\State;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class StateController extends Controller
{
    public function index(): View
    {
        return view('state.index');
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(StateStoreRequest $request): JsonResponse
    {
        State::create($request->validated());
        return response()->json(['status' => 200]);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(StateUpdateRequest $request, State $state ): JsonResponse
    {
        $state->update($request->validated());
        return response()->json(['status' => 200]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(State $state): JsonResponse
    {
        $state->delete();

        return response()->json([
            'status' => true,
            'message' => "State deleted successfully",
        ]);
    }

}
