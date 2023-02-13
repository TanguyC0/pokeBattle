<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\User_game;
use App\Models\Box;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Inertia\Inertia;
use Inertia\Response;
use Illuminate\Support\Facades\Session;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): Response
    {
        return Inertia::render('Auth/Register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:'.User::class,
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            //starter required string feu,plante,eau
            'starter' => 'required|string|in:feu,plante,eau',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        switch ($request->starter) {
            case 'feu':
                $starter = 155;
                break;
            case 'plante':
                $starter = 906;
                break;
            case 'eau':
                $starter = 501;
                break;
        }

        $user_game = User_game::create([
            'id' => $user->id,
            'team' => json_encode([0,0,0,0,0,0]),
            'favorite' => $starter,
        ]);

        $pokemon = Box::create([
            'id_pokemon' => $starter,
            'id_user' => $user->id,
            'level' => 1,
            'hp' => rand(10, 25),
            'attack' => rand(10, 25),
            'defense' => rand(10, 25),
            'xp' => 0,
        ]);

        $user_game->team = json_encode([$pokemon->id,0,0,0,0,0]);
        $user_game->save();

        $request->session()->regenerate();

        session(['id' => $user->id]);
        
        event(new Registered($user));

        Auth::login($user);

        return redirect('login');
    }
}
