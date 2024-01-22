<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

/**
 * Système d'utilisateur Laravel
 */
class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'address',
        'password',
        'role'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    /**
     * Récupère un produit spécifique du panier de l'utilisateur en fonction de l'ID
     *
     * @param int $productId
     * @return CartProduct|null
     */
    public function getCartProductById($productId)
    {
        return $this->cartProducts()->where('id', $productId)->first();
    }

    /**
     * Récupère tous les éléments du panier de l'utilisateur actuel.
     *
     * @return Collection
     */
    public function cartProducts()
    {
        return CartProduct::where('user_id', $this->id)->get();
    }
}
