<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class InfoController extends Controller
{

    /**
     * Crée une nouvelle instance du contrôleur d'information
     */
    public function __construct()
    {
        $this->middleware('maintenance');
    }

    /**
     * Affiche la vue de la page d'information
     *
     * @return View
     */
    public function index()
    {
        return view('info');
    }
}
