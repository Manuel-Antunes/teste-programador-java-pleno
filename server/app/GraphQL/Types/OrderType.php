<?php

// app/graphql/types/CategoryType 

namespace App\GraphQL\Types;

use App\Models\Order;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Type as GraphQLType;

class OrderType extends GraphQLType
{
    protected $attributes = [
        'name' => 'Order',
        'desc' => '',
        'model' => Order::class
    ];

    public function fields(): array
    {
        return [
            'number' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'Order number'
            ],
            'issue_date' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'Order issue date'
            ],
            'desc' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'Order description'
            ],
            'total_price' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'Order total price'
            ],
            'user' => [
                'type' => GraphQL::type('User'),
                'description' => 'Order user'
            ],
            'products' => [
                'type' => Type::listOf(GraphQL::type('Product')),
                'description' => 'Products list'
            ]
        ];
    }
}