<?php

namespace App\Http\Controllers\Admin\Product;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ProductEditAdminController extends Controller
{

    /**
     * Crée une nouvelle instance du contrôleur d'édition de produit
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
    }

    /**
     * Affiche la vue qui permet l'édition d'un produit via le dashboard admin
     *
     * @param int $id
     * @return \Illuminate\View\View
     */
    public function index($id)
    {
        $product = Product::find($id);
        return view('admin.products.edit', compact("product"));
    }

    /**
     * Met à jour un produit à partir des données du formulaire
     *
     * @param Request $request
     * @param int $id
     * @return RedirectResponse
     */
    public function edit(Request $request, $id)
    {
        $product = Product::find($id);

        if (!$product) {
            abort(404);
        }

        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|gt:0',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $data = [
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'price' => $request->input('price'),
            'category' => $request->input('category'),
        ];

        $product->title = $data['title'];
        $product->description = $data['description'];
        $product->price = $data['price'];
        $product->category = $data['category'];

        if ($request->hasFile("image")) {
            Storage::delete($product->image);
            $product->image = $request->file('image')->store('public/product_images');
        }

        $product->save();
        return redirect()->route('admin.product');
    }
}
