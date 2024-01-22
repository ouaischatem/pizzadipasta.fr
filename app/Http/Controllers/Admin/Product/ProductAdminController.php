<?php

namespace App\Http\Controllers\Admin\Product;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class ProductAdminController extends Controller
{

    /**
     * Crée une nouvelle instance du contrôleur d'administration des produits
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
    }

    /**
     * Affiche la liste paginée des produits disponibles
     *
     * @return View
     */
    public function index()
    {
        $products = Product::paginate(10);
        return view('admin.products.index', compact('products'));
    }

    /**
     * Supprime un produit en fonction de son id
     *
     * @param int $id
     * @return RedirectResponse
     */
    public function delete($id): RedirectResponse
    {
        $product = Product::find($id);

        if (!$product) {
            abort(404);
        }

        $product->delete();
        return redirect()->route('admin.product');
    }
}
