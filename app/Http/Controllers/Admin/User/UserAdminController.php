<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class UserAdminController extends Controller
{

    /**
     * Crée une nouvelle instance du contrôleur d'administration des utilisateurs
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
    }

    /**
     * Affiche la liste paginée des utilisateurs
     *
     * @return View
     */
    public function index()
    {
        $users = User::paginate(10);
        return view('admin.users.index', compact('users'));
    }

    /**
     * Supprime un utilisateur en fonction de son id
     *
     * @param int $id
     * @return RedirectResponse
     */
    public function delete($id): RedirectResponse
    {
        $user = User::find($id);

        if (!$user) {
            abort(404);
        }

        $user->delete();
        return redirect()->route('admin.users');
    }
}
