<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class UserController extends Controller
{

    /**
     * Crée une nouvelle instance du contrôleur de user
     */
    public function __construct()
    {
        $this->middleware('maintenance');
        $this->middleware('auth');
    }

    /**
     * Affiche la vue de la page d'utilisateur
     *
     * @return View
     */
    public function index()
    {
        $user = Auth::user();
        return view('user.index', compact("user"));
    }

    /**
     * Met à jour l'utilisateur à partir des données du formulaire
     *
     * @param Request $request
     * @param int $id
     * @return RedirectResponse
     */
    public function edit(Request $request)
    {
        $user = Auth::user();

        if (!$user) {
            abort(404);
        }

        $data = [
            'name' => $request->filled('name') ? $request->input('name') : $user->name,
            'email' => $request->filled('email') ? $request->input('email') : $user->email,
            'address' => $request->filled('address') ? $request->input('address') : $user->address,
            'password' => $request->filled('password') ? $request->input('password') : $user->password,
        ];

        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->address = $data['address'];
        $user->password = $data['password'];

        $user->save();
        return redirect()->route('user');
    }
}
