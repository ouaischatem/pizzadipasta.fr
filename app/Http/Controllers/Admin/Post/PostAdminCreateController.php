<?php

namespace App\Http\Controllers\Admin\Post;

use App\Contracts\PostRepositoryInterface;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;

class PostAdminCreateController extends Controller
{

    protected PostRepositoryInterface $postRepository;

    /**
     * Crée une nouvelle instance du contrôleur de création de postes
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
     * Affiche la vue qui permet la création d'un nouveau poste via le dashboard admin
     *
     * @return View
     */
    public function index()
    {
        return view('admin.posts.create');
    }

    /**
     * Stocke un nouveau poste à partir des données du formulaire
     * 
     * @param Request $request
     * @return RedirectResponse
     * @post : le nouveau posts est bien enregistré dans la base de données
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'image' => 'required|image|mimes:jpeg,png,webp,jpg,gif,svg|max:2048',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'content' => 'required|string'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $this->postRepository->createPost([
            'image' => $request->file('image')->store('public/post_images'),
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'content' => $request->input('content'),
            'quote' => $request->input('quote'),
            'visible' => $request->has('visible'),
        ]);

        return redirect()->route('admin.posts');
    }
}
