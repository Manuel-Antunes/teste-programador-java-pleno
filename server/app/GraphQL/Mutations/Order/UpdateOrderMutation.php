<?php

namespace App\GraphQL\Mutations\Order;

use App\Models\Order;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Mutation;

class UpdateOrderMutation extends Mutation
{
    protected $attributes = [
        'name' => 'updateOrder',
        'description' => 'Updates a order'
    ];

    public function type(): Type
    {
        return GraphQL::type('Order');
    }

    public function args(): array
    {
        return [
            'number' => [
                'name' => 'number',
                'type' => Type::nonNull(Type::int())
            ],
            'desc' => [
                'name' => 'desc',
                'type' => Type::string()
            ],
            'product_ids' => [
                'name' => 'product_ids',
                'type' => Type::listOf(Type::string()),
            ],
            'user_code' => [
                'name' => 'user_code',
                'type' => Type::string(),
                'rules' => ['exists:users,code']
            ]
        ];
    }

    public function resolve($root, $args)
    {
        $order = Order::where('number', $args['number'])->first();
        $order->fill($args);
        $order->save();

        return $order;
    }
}