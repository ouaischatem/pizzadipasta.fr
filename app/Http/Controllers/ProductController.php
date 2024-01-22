<?php

namespace App\Http\Controllers;

use App\Models\CartProduct;
use App\Models\Format;
use App\Models\Product;
use App\Models\Topping;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class ProductController extends Controller
{

    /**
     * Crée une nouvelle instance du contrôleur de produits
     */
    public function __construct()
    {
        $this->middleware('maintenance');
    }

    /**
     * Affiche la vue de la liste de tous les produits
     *
     * @return View
     */
    public function index()
    {
        $products = Product::all();
        return view('products.index', compact("products"));
    }

    /**
     * Affiche un produit en détail avec la possibilité d'ajouter des suppléments
     *
     * @return View
     */
    public function show($id)
    {
        $product = Product::find($id);
        $toppings = Topping::all();
        $formats = Format::all();

        return view('products.show', compact('product', 'toppings', 'formats'));
    }

    /**
     * Ajoute un produit au panier de l'utilisateur
     *
     * @param int $productId
     * @param Request $request
     * @return RedirectResponse
     */
    public function addToCart(Request $request, int $productId)
    {
        $user = Auth::user();
        $product = Product::find($productId);

        if ($user && $product) {
            $size = $request->input('size', 'small');
            $format = Format::where('size', $size)->first();
            $formatId = $format ? $format->id : 1;
            $toppingIds = $request->input('topping_ids', []);

            $existingCartItemQuery = CartProduct::where('user_id', $user->id)
                ->where('product_id', $productId)
                ->where('format_id', $formatId);

            if (!empty($toppingIds)) {
                foreach ($toppingIds as $toppingId) {
                    $existingCartItemQuery->whereHas('toppings', function ($q) use ($toppingId) {
                        $q->where('topping_id', $toppingId);
                    });
                }
            } else {
                $existingCartItemQuery->whereDoesntHave('toppings');
            }

            $existingCartItem = $existingCartItemQuery->first();

            if ($existingCartItem) {
                $existingCartItem->increment('quantity');
            } else {
                $cartItemData = [
                    'user_id' => $user->id,
                    'product_id' => $productId,
                    'quantity' => 1,
                    'format_id' => $formatId,
                ];

                $cartItem = CartProduct::create($cartItemData);

                if (!empty($toppingIds)) {
                    $cartItem->toppings()->attach($toppingIds);
                }
            }
        }

        return redirect()->route('login');
    }
}
