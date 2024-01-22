<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;

class UserAdminCreateController extends Controller
{

    /**
     * Crée une nouvelle instance du contrôleur de création d'utilisateur
     *
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
    }

    /**
     * Affiche la vue qui permet la création d'un nouvel utilisateur via le dashboard admin
     *
     * @return View
     */
    public function index()
    {
        return view('admin.users.create');
    }

    /**
     * Stocke un nouvel utilisateur à partir des données du formulaire
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $data = [
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'address' => $request->input('address'),
            'password' => $request->input('password'),
            'role' => $request->input('role'),
        ];

        $user = new User($data);
        $user->save();
        return redirect()->route('admin.users');
    }
}
