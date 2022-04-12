<?php

namespace App\GraphQL\Schemas;

use Rebing\GraphQL\Support\Contracts\ConfigConvertible;

class Order implements ConfigConvertible
{
    public function toConfig(): array
    {
        return [
            'query' => [
                'order' => \App\GraphQL\Queries\Order\OrderQuery::class,
                'orders' => \App\GraphQL\Queries\Order\OrdersQuery::class,
            ],

            'mutation' => [
                'createOrder' => \App\GraphQL\Mutations\Order\CreateOrderMutation::class,
                'updateOrder' => \App\GraphQL\Mutations\Order\UpdateOrderMutation::class,
                'deleteOrder' => \App\GraphQL\Mutations\Order\DeleteOrderMutation::class,
            ],

            'types' => [
                'Order' => \App\GraphQL\Types\OrderType::class,
            ],
        ];
    }
}
