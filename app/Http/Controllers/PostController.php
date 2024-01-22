<?php

namespace App\Http\Controllers;

use App\Contracts\PostRepositoryInterface;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class PostController extends Controller
{

    protected PostRepositoryInterface $postRepository;

    /**
     * Crée une nouvelle instance du contrôleur de postes
     *
     * @param \App\Contracts\PostRepositoryInterface $postRepository
     */
    public function __construct(PostRepositoryInterface $postRepository)
    {
        $this->middleware('maintenance');
        $this->postRepository = $postRepository;
    }

    /**
     * Affiche une liste paginée de tous les postes disponibles
     *
     * @return View
     */
    public function index()
    {
        $posts = $this->postRepository->getAllPosts(true)->paginate(3);
        return view('posts.index', compact('posts'));
    }

    /**
     * Affiche les détails d'un poste en fonction de son id
     *
     * @param int $id
     * @return View|RedirectResponse
     */
    public function show($id)
    {
        $post = $this->postRepository->getPostById($id);

        if ($post and $post->visible) {
            return view('posts.show', compact('post'));
        }

        abort(404);
    }
}
