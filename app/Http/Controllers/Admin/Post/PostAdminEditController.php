<?php

namespace App\Http\Controllers\Admin\Post;

use App\Contracts\PostRepositoryInterface;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;

class PostAdminEditController extends Controller
{

    protected PostRepositoryInterface $postRepository;

    /**
     * Crée une nouvelle instance du contrôleur d'édition de poste
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
     * Affiche la vue qui permet l'édition d'un poste via le dashboard admin
     *
     * @param int $id
     * @return View
     */
    public function index($id)
    {
        $post = $this->postRepository->getPostById($id);
        return view('admin.posts.edit', compact("post"));
    }

    /**
     * Met à jour un poste à partir des données du formulaire
     * @precondition : changement du formulaire
     * @param Request $request
     * @param int $id
     * @return RedirectResponse
     * @post : l'id a ete trouver et le formulaire a bien été enregistré
     */
    public function edit(Request $request, $id)
    {
        $post = $this->postRepository->getPostById($id);

        if (!$post) {
            abort(404);
        }

        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'content' => 'required|string'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $data = [
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'content' => $request->input('content'),
            'visible' => $request->has('visible'),
        ];

        if ($request->has("quote")) {
            $data['quote'] = $request->input('quote');
        }

        if ($request->hasFile("image")) {
            Storage::delete($post->image);

            $data['image'] = $request->file('image')->store('public/post_images');
        }

        $this->postRepository->updatePost($id, $data);
        return redirect()->route('admin.posts');
    }
}
