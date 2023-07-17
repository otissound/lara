<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Validator;

class User extends Controller
{
    /**
     * Handle user registration.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function register(Request $request)
    {
        // Validate user input
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);

        // Check validation errors
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }

        // Perform user registration logic
        // ...

        return response()->json(['message' => 'User registered successfully'], 200);
    }

    /**
     * Handle password reset request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function resetPassword(Request $request)
    {
        // Validate user input
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
        ]);

        // Check validation errors
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }

        // Generate password reset token and send email
        // ...

        return response()->json(['message' => 'Password reset email sent'], 200);
    }

    /**
     * Handle profile update.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function updateProfile(Request $request)
    {
        // Validate user input
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'age' => 'required|integer|min:0',
        ]);

        // Check validation errors
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }

        // Update the user profile
        // ...

        return response()->json(['message' => 'Profile updated successfully'], 200);
    }

    /**
     * Handle profile photo update.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function updateProfilePhoto(Request $request)
    {
        // Validate user input
        $validator = Validator::make($request->all(), [
            'photo_url' => 'required|url',
        ]);

        // Check validation errors
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }

        // Send API call to update profile photo
        $apiUrl = 'https://bsyv6zxlqryrihjlatj6udaqte0tteyc.lambda-url.eu-central-1.on.aws/';
        $payload = [
            'image_url' => $request->input('photo_url'),
        ];

        try {
            // Make the API call
            $response = Http::post($apiUrl, $payload);

            // Check if API call was successful
            if ($response->successful()) {
                return response()->json(['message' => 'Profile photo updated successfully'], 200);
            } else {
                return response()->json(['error' => 'Failed to update profile photo'], 500);
            }
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to make API call'], 500);
        }
    }
}
