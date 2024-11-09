<?php

namespace App\Http\Controllers\Auth;

use App\Actions\UserCreateAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserStoreRequest;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     */
    public function store(UserStoreRequest $userStoreRequest, UserCreateAction $userCreateAction): JsonResponse
    {
        $userCreateAction->execute($userStoreRequest);

        session()->flash('success', 'User created successfully!');
        return response()->json(['redirect' => route('dashboard')]);
    }
}
