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
                'type' => Type::nonNull(Type::string()),
            ],
            'issue_date' => [
                'name' => 'issue_date',
                'type' => Type::nonNull(Type::string()),
            ],
            'desc' => [
                'name' => 'desc',
                'type' => Type::nonNull(Type::string()),
            ],
            'total_price' => [
                'name' => 'total_price',
                'type' => Type::nonNull(Type::string()),
            ],
        ];
    }

    public function resolve($root, $args)
    {
        $order = Order::findOrFail($args['number']);
        $order->fill($args);
        $order->save();

        return $order;
    }
}