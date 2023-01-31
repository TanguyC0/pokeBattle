<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;
use Inertia\Response;
use App\Models\User_game;
//use session
use Illuminate\Support\Facades\Session;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): Response
    {
        return Inertia::render('Profile/Edit', [
            'mustVerifyEmail' => $request->user() instanceof MustVerifyEmail,
            'status' => session('status'),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validate([
            'password' => ['required', 'current-password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }

    public function jauge(Request $request)
    {
        // verifier si l'utilisateur existe
        $id = null;
        if($request->user())
            $id = $request->user()->id;

        if (User_game::where('id', $id)->doesntExist() || $id == null) {
            $list = [
                'xp' => 50,
                'money' => 0,
                'level' => 1,
                'max_box' => 10,
                'box' => 5,
                'pdp' => 1,
            ];
        } else {
            $data = User_game::where('id', $id)->first();

            $list = [
                'xp' => $data->exp,
                'money' => $data->money,
                'level' => $data->level,
                'max_box' => $data->max_box,
                'box' => 10,
                'pdp' => $data->image,
            ];
        }

        return $list;
    }
    
}
