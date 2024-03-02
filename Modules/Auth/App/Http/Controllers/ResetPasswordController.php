<?php

namespace Modules\Auth\App\Http\Controllers;

use Illuminate\Http\Request;
use Modules\Auth\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;


class ResetPasswordController extends Controller
{

    public function resetPassword(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users',
            'password' => 'required|string|min:6|confirmed',
            'password_confirmation' => 'required'
        ]);

        User::where('email', $request->email)
            ->update(['password' => Hash::make($request->password)]);

        return response()->json(['message' => 'Your password has been changed!']);
    }
}
