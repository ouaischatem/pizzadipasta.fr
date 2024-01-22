<?php

namespace App\Http\Controllers;

use App\Contracts\PostRepositoryInterface;
use Illuminate\View\View;

class HomeController extends Controller
{

    protected PostRepositoryInterface $postRepository;

    /**
     * Crée une nouvelle instance du contrôleur d'accueil
     *
     * @param \App\Contracts\PostRepositoryInterface $postRepository
     */
    public function __construct(PostRepositoryInterface $postRepository)
    {
        $this->middleware('maintenance');
        $this->postRepository = $postRepository;
    }

    /**
     * Affiche la vue de la page d'accueil avec les posts visibles
     *
     * @return View
     */
    public function index()
    {
        $posts = $this->postRepository->getAllPosts(true)->paginate(3);
        return view('home', compact("posts"));
    }
}
