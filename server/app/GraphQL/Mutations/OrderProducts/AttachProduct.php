<?php

declare(strict_types=1);

namespace App\GraphQL\Mutations\OrderProducts;

use Closure;
use App\Models\Order;
use GraphQL\Type\Definition\NonNull;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Mutation;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\SelectFields;

class AttachProduct extends Mutation
{
    protected $attributes = [
        'name' => 'attachProduct',
        'description' => 'A mutation'
    ];

    public function type(): Type
    {
        return Type::listOf(GraphQL::type('Product'));
    }

    public function args(): array
    {
        return [
            'order_id' => [
                'name' => 'order_id',
                'type' => Type::nonNull(Type::int())
            ],
            'product_ids' => [
                'name' => 'product_ids',
                'type' => Type::nonNull(Type::listOf(Type::string()))
            ]
        ];
    }

    public function resolve($root, $args)
    {
        $order = Order::findOrFail($args['order_id']);
        $order->products()->sync($args['product_ids']);

        return $order->products;
    }
}
