<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Product;

class Order extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'number',
        'issue_date',
        'desc',
        'user_code'
    ];

    public function products() 
    {
        return $this->belongsToMany(Product::class, 'order_products', 'order_id', 'product_code', 'id', 'code');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_code', 'code');
    }
}
