<?php

namespace App\Http\Controllers;

use App\Http\Requests\PasswordResetLinkRequest;
use App\Http\Requests\ResetPasswordRequest;
use App\Models\User;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Validation\ValidationException;

class UserController extends Controller
{
    function requestPasswordResetLink(PasswordResetLinkRequest $request)
    {
        $status = Password::sendResetLink($request->validated());

        if ($status !== Password::ResetLinkSent) {
            throw ValidationException::withMessages(['email' => [__($status)]]);
        }

        return response()->json(['message' => __($status)]);
    }

    function resetPassword(ResetPasswordRequest $request)
    {
        $status = Password::reset(
            $request->validated(),
            function (User $user, string $password) {
                $user->forceFill(['password' => Hash::make($password)])->save();
                event(new PasswordReset($user));
            }
        );

        if ($status !== Password::PasswordReset) {
            throw ValidationException::withMessages(['email' => [__($status)]]);
        }

        return response()->json(['message' => __($status)]);
    }
}
