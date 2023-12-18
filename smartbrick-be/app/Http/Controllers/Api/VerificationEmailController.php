<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class VerificationEmailController extends Controller
{
    public function sendOtp(Request $request)
    {
        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return response()->json([
                'success' => false,
                'message' => 'User not found'
            ], 404);
        }

        if ($user->hasVerifiedEmail()) {
            return response()->json([
                'success' => false,
                'message' => 'Email has been verified'
            ], 422);
        }

        $user->sendEmailVerificationNotification();

        return response()->json([
            'success' => true,
            'message' => 'OTP code has been sent to email'
        ]);
    }

    public function verifyEmail(Request $request)
    {
        $user = User::where('email', $request->email)->first();
        if ($user->email_verified_at) {
            return response()->json([
                'success' => false,
                'message' => 'Email has been verified'
            ], 422);
        }
        if ($request->otp == $user->otp && $user->otp_expired_at > now()) {
            User::where('email', $request->email)->update([
                'email_verified_at' => now(),
                'otp' => null,
                'otp_expired_at' => null
            ]);
            return response()->json([
                'success' => true,
                'message' => 'Email verified successfully'
            ]);
        }

        return response()->json([
            'success' => false,
            'message' => 'Invalid or expired OTP'
        ], 422);
    }
}
