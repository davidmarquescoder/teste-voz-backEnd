<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): JsonResponse
    {
        try {
            $request->authenticate();

            $user  = User::where(column: 'email', operator: $request->email)->first();

            $user->tokens()->delete();
            $token = $user->createToken("authToken")->plainTextToken;

            return $this->success(
                message: __(key: 'messages.response_messages.auth.login'),
                data: [
                    "user" => $user,
                    "token" => $token,
                ]
            );
        } catch (\Exception $error) {
            return $this->error(message: $error->getMessage(), code: $error->getCode());
        }
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): JsonResponse
    {
        try {
            $request->user()->currentAccessToken()->delete();

            return $this->success(message: __(key: 'messages.response_messages.auth.logout'));
        } catch (\Exception $error) {
            return $this->error(message: $error->getMessage(), code: $error->getCode());
        }
    }
}
