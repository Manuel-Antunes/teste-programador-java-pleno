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
            'codigo' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'Codigo do produto'
            ],
            'descricao' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'Descricao do produto'
            ],
            'unidade' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'Unidade de produtos'
            ],
            'valor' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'Valor dos produtos'
            ],
            'pedidos' => [
                'type' => Type::listOf(GraphQL::type('Pedido')),
                'description' => 'Lista de pedidos com o produto'
            ]
        ];
    }
}