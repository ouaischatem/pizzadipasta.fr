<?php

namespace App\Http\Controllers\Admin\Product;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;

class ProductCreateAdminController extends Controller
{

    /**
     * Crée une nouvelle instance du contrôleur de création de produits
     *
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
    }

    /**
     * Affiche la vue qui permet la création d'un nouveau produit via le dashboard admin
     *
     * @return View
     */
    public function index()
    {
        return view('admin.products.create');
    }

    /**
     * Stocke un nouveau produit à partir des données du formulaire
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,webp,jpg,gif,svg|max:2048',
            'description' => 'required|string',
            'price' => 'required|numeric|gt:0',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $data = [
            'title' => $request->input('title'),
            'image' => $request->file('image')->store('public/product_images'),
            'description' => $request->input('description'),
            'price' => $request->input('price'),
            'category' => $request->input('category'),
        ];

        $product = new Product($data);
        $product->save();
        return redirect()->route('admin.product');
    }
}
