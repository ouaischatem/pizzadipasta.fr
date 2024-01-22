<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class CartController extends Controller
{

    /**
     * Crée une nouvelle instance du contrôleur de panier
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('maintenance');
    }

    /**
     * Affiche le panier de l'utilisateur avec les produits triés par coût total décroissant
     *
     * @return View
     */
    public function index()
    {
        $user = Auth::user();
        $cartProducts = $user->cartProducts();

        $cartProducts = $cartProducts->sortByDesc(function ($cartProduct) {
            $toppingsPrice = 0;

            foreach ($cartProduct->toppings as $topping) {
                $toppingsPrice += $topping->price;
            }

            return ($cartProduct->product->price + $cartProduct->format->price + $toppingsPrice) * $cartProduct->quantity;
        });

        return view('cart.index', compact('cartProducts'));
    }

    /**
     * Supprime un produit du panier de l'utilisateur
     *
     * @param int $id
     * @return RedirectResponse
     */
    public function remove($id)
    {
        $user = Auth::user();
        $cartProduct = $user->getCartProductById($id);

        if ($cartProduct) {
            $cartProduct->delete();
        }

        return redirect()->route('cart');
    }

    /**
     * Augmente la quantité d'un produit dans le panier de l'utilisateur
     *
     * @param int $id
     * @return RedirectResponse
     */
    public function increaseQuantity($id)
    {
        $user = Auth::user();
        $cartProduct = $user->getCartProductById($id);

        if ($cartProduct) {
            $cartProduct->quantity += 1;
            $cartProduct->save();
        }

        return redirect()->route('cart');
    }

    /**
     * Diminue la quantité d'un produit dans le panier de l'utilisateur
     *
     * @param int $id
     * @return RedirectResponse
     */
    public function decreaseQuantity($id)
    {
        $user = Auth::user();
        $cartProduct = $user->getCartProductById($id);

        if ($cartProduct) {
            $newQuantity = max(1, $cartProduct->quantity - 1);
            $cartProduct->quantity = $newQuantity;
            $cartProduct->save();

            return redirect()->route('cart');
        }

        return redirect()->route('cart');
    }
}
