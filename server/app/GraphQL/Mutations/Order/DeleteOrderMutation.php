<?php

namespace App\GraphQL\Mutations\Order;

use App\Models\Order;
use Rebing\GraphQL\Support\Mutation;
use GraphQL\Type\Definition\Type;

class DeleteOrderMutation extends Mutation
{
    protected $attributes = [
        'name' => 'deleteOrder',
        'description' => 'deletes a Order'
    ];

    public function type(): Type
    {
        return Type::boolean();
    }

    public function args(): array
    {
        return [
            'number' => [
                'name' => 'number',
                'type' => Type::string(),
                'rules' => ['required']
            ]
        ];
    }

    public function resolve($root, $args)
    {
        $order = Order::where('number', $args['number'])->first();

        return  $order->delete() ? true : false;
    }
}