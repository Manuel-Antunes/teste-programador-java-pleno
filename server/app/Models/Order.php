<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use Illuminate\Database\Eloquent\Casts\Attribute;
use App\Models\Product;

class Order extends Model
{
    use HasFactory;

    protected $casts = [
        'issue_date' => 'date',
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'number',
        'issue_date',
        'desc',
        'user_code',
    ];

    public function totalPrice(): Attribute
    {
        $totalPrice = 0;
        foreach ($this->products as $product) {
            $totalPrice = $totalPrice + $product->price;
        }
        return Attribute::make(
            get: fn () => $totalPrice,
        );
    }

    public function products() 
    {
        return $this->belongsToMany(Product::class, 'order_products', 'order_id', 'product_code', 'id', 'code');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_code', 'code');
    }
}
