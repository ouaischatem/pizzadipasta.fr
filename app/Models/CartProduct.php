<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class CartProduct extends Model
{
    use HasFactory;

    protected $table = 'cart_product';
    protected $fillable = [
        'user_id',
        'product_id',
        'quantity',
        'format_id',
    ];

    /**
     * Permet d'associer chaque élément du panier à un format
     *
     * @return BelongsTo
     */
    public function format()
    {
        return $this->belongsTo(Format::class);
    }

    /**
     * Permet d'associer chaque élément du panier à un produit spécifique
     *
     * @return BelongsTo
     */
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    /**
     * Permet de récupérer les suppléments liés à ce produit du panier
     *
     * @return BelongsToMany
     */
    public function toppings()
    {
        return $this->belongsToMany(Topping::class, 'product_toppings')
            ->withTimestamps();
    }
}
