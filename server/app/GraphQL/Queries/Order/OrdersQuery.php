<?php


namespace App\GraphQL\Queries\Order;

use App\Models\Order;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Query;

class OrdersQuery extends Query
{
    protected $attributes = [
        'name' => 'orders',
    ];

    public function type(): Type
    {
        return Type::listOf(GraphQL::type('Order'));
    }

    public function resolve($root, $args)
    {
        return Order::all();
    }
}