<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('administration.pages.profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        Log::info('Password update function is called.');

        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }
    public function updatePassword(Request $request): RedirectResponse
            {
                Log::info('Password update function is called.');
                dd("hvvhjhv"); // Outputs all validation errors as an associative array

                // try {
                //     dd("hvvhjhv"); // Outputs all validation errors as an associative array

                //     $request->validate([
                //         'current_password' => ['required', 'current_password'], // Validates the current password
                //         'password' => ['required', 'string', 'min:8', 'confirmed'], // Validates the new password and its confirmation
                //     ]);
                // } catch (\Illuminate\Validation\ValidationException $e) {
                //     dd($e->errors()); // Outputs all validation errors as an associative array
                // }

                // $user = $request->user();
                // $user->update([
                //     'password' => Hash::make($request->password), // Hash the new password before saving
                // ]);

                return Redirect::route('administration.index')->with('status', 'password-updated');
            }


    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {

        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();
        if (!$user) {
            // Flash an error message to the session
            return back()->withErrors(['password' => 'User not found or you are not logged in.']);
        }
        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/')->with('status', 'Account deleted successfully.');;
    }
}
