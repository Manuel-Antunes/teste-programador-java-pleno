<?php

namespace App\GraphQL\Mutations\Order;

use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Rebing\GraphQL\Support\Mutation;
use GraphQL\Type\Definition\Type;
use Illuminate\Database\Eloquent\Model;
use Rebing\GraphQL\Support\Facades\GraphQL;

class CreateOrderMutation extends Mutation
{
    protected $attributes = [
        'name' => 'createOrder',
        'description' => 'Creates a Order'
    ];

    public function type(): Type
    {
        return GraphQL::type('Order');
    }

    public function args(): array
    {
        return [
            'desc' => [
                'name' => 'desc',
                'type' => Type::nonNull(Type::string())
            ],
            'product_ids' => [
                'name' => 'product_ids',
                'type' => Type::nonNull(Type::listOf(Type::string())),
            ],
            'user_code' => [
                'name' => 'user_code',
                'type' => Type::nonNull(Type::string()),
                'rules' => ['exists:users,code']
            ]
        ];
    }

    public function resolve($root, $args)
    {      
        //$user = User::all()->where('code', $args['user_code'])->first();
        $order = new Order();
        $order->fill($args);
        //$order->user()->associate($user);
        $order->save();

        $order->products()->sync($args['product_ids']);

        return $order;
    }
}