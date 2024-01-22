<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class UserAdminEditController extends Controller
{

    /**
     * Crée une nouvelle instance du contrôleur d'édition d'utilisateur
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
    }

    /**
     * Affiche la vue qui permet l'édition d'un utilisateur via le dashboard admin
     *
     * @param int $id
     * @return View
     */
    public function index($id)
    {
        $user = User::find($id);
        return view('admin.users.edit', compact("user"));
    }

    /**
     * Met à jour un utilisateur à partir des données du formulaire
     *
     * @param Request $request
     * @param int $id
     * @return RedirectResponse
     */
    public function edit(Request $request, $id)
    {
        $user = User::find($id);

        if (!$user) {
            abort(404);
        }

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($user->id)],
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $user->update([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'address' => $request->input('address'),
            'role' => $request->input('role'),
            'password' => $request->input('password') ?? $user->password,
        ]);

        return redirect()->route('admin.users');
    }
}
