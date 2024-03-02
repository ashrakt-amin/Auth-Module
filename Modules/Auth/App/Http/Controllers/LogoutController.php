<?php

namespace Modules\Auth\App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Laravel\Sanctum\PersonalAccessToken;

class LogoutController extends Controller
{

    public function logout(Request $request)
    {
        $logout = PersonalAccessToken::findToken($request->bearerToken())->delete();

        if ($logout) {
            return response()->json([
                'message' => 'Successfully logged out.',
            ]);
        } else {
            return response()->json([
                'message' => 'Error occurred while logging out.',
            ]);
        }
    }
}
