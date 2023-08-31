<?php


namespace App\GraphQL\Queries\Order;

use App\Models\Order;
use Closure;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Query;
use Rebing\GraphQL\Support\SelectFields;

class OrdersQuery extends Query
{
    protected $attributes = [
        'name' => 'orders',
    ];

    public function type(): Type
    {
        return Type::listOf(GraphQL::type('Order'));
    }

    public function resolve($root, array $args, $context, ResolveInfo $info, SelectFields $fields)
    {
        $select = $fields->getSelect();
        $with = $fields->getRelations();
        $orders = Order::select($select)->with($with);

        return $orders->get();
    }
}