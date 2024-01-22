<?php

namespace App\Http\Controllers\Admin;

use App\Contracts\PostRepositoryInterface;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\View\View;

class AdminController extends Controller
{

    protected PostRepositoryInterface $postRepository;


    /**
     * Crée une nouvelle instance du contrôleur d'administration
     *
     * @param PostRepositoryInterface $postRepository
     */
    public function __construct(PostRepositoryInterface $postRepository)
    {
        $this->middleware('auth');
        $this->middleware('admin');
        $this->postRepository = $postRepository;
    }

    /**
     * Affiche les statistiques du site, y compris le nombre d'utilisateurs,
     * le nombre de posts
     *
     * @return View
     */
    public function index()
    {
        $users = User::get()->count();
        $posts = $this->postRepository->getPostsCount();
        return view('admin.stats.index', compact("users", "posts"));
    }
}
