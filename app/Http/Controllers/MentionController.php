<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class MentionController extends Controller
{

    /**
     * Crée une nouvelle instance du contrôleur de mention
     */
    public function __construct()
    {
        $this->middleware('maintenance');
    }

    /**
     * Affiche la vue de la page de mention légales
     *
     * @return View
     */
    public function index()
    {
        return view('mention');
    }
}
