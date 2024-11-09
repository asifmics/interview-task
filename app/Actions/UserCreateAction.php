<?php

namespace App\Actions;

use App\Http\Requests\UserStoreRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserCreateAction
{
    public function execute( UserStoreRequest $userStoreRequest): void
    {
        $data = $userStoreRequest->validated();

        $user = User::create([
            'name' => $data['name'],
            'username' => $data['username'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

        Auth::login($user);
    }
}
