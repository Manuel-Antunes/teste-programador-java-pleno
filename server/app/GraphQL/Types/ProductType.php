<?php

// app/graphql/types/CategoryType 

namespace App\GraphQL\Types;

use App\Models\Product;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Type as GraphQLType;

class ProductType extends GraphQLType
{
    protected $attributes = [
        'name' => 'Product',
        'description' => '',
        'model' => Product::class
    ];

    public function fields(): array
    {
        return [
            'code' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'Product code'
            ],
            'name' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'Product name'
            ],
            'desc' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'Product description'
            ],
            'units' => [
                'type' => Type::nonNull(Type::int()),
                'description' => 'Product units'
            ],
            'price' => [
                'type' => Type::nonNull(Type::float()),
                'description' => 'Product price'
            ],
            'orders' => [
                'type' => Type::listOf(GraphQL::type('Order')),
                'description' => 'List of orders with the product'
            ]
        ];
    }
}