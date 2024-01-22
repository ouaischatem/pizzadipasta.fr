<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class CGVController extends Controller
{

    /**
     * Crée une nouvelle instance du contrôleur de CGV
     */
    public function __construct()
    {
        $this->middleware('maintenance');
    }

    /**
     * Affiche la vue de la page de CGV
     *
     * @return View
     */
    public function index()
    {
        return view('cgv');
    }
}
