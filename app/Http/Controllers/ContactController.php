<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class ContactController extends Controller
{

    /**
     * Crée une nouvelle instance du contrôleur de contact
     */
    public function __construct()
    {
        $this->middleware('maintenance');
    }

    /**
     * Affiche la vue de la page de contact
     *
     * @return View
     */
    public function index()
    {
        return view('contact');
    }
}
