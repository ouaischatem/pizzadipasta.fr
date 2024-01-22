<?php

namespace App\Http\Controllers\Admin\Post;

use App\Contracts\PostRepositoryInterface;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class PostAdminController extends Controller
{

    protected PostRepositoryInterface $postRepository;

    /**
     * Crée une nouvelle instance du contrôleur d'administration des postes.
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
     * Affiche la liste de tous les postes disponibles
     *
     * @return View
     */
    public function index()
    {
        $posts = $this->postRepository->getAllPosts(false);
        return view('admin.posts.index', compact("posts"));
    }

    /**
     * Supprime un poste en fonction de son id
     * @précondition : un posts doit etre supprimé
     * @param int $id
     * @return RedirectResponse
     * @post : le post a bien été supprimé de la base de donnée
     */
    public function delete($id): RedirectResponse
    {
        $this->postRepository->deletePost($id);
        return redirect()->route('admin.posts');
    }
}
