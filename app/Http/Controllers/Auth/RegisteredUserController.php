<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'prenom' => ['required', 'string', 'max:255'], // Ajout de la validation pour 'prenom'
            'adresse' => ['required', 'string', 'max:255'], // Ajout de la validation pour 'adresse'
            'ville' => ['required', 'string', 'max:255'], // Ajout de la validation pour 'ville'
            'tel' => ['required', 'string', 'max:255'], // Ajout de la validation pour 'tel'
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);


        $user = User::create([
            'name' => $request->name,
            'prenom' => $request->prenom, // Ajout de 'prenom'
            'adresse' => $request->adresse, // Ajout de 'adresse'
            'ville' => $request->ville, // Ajout de 'ville'
            'tel' => $request->tel, // Ajout de 'tel'
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role_id' => 2, // Assurez-vous que ce rôle existe dans votre table `roles`
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
