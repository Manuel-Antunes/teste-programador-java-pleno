<?php

namespace App\GraphQL\Schemas;

use Rebing\GraphQL\Support\Contracts\ConfigConvertible;

class Product implements ConfigConvertible
{
    public function toConfig(): array
    {
        return [
            'query' => [
                'product' => \App\GraphQL\Queries\Product\ProductQuery::class,
                'products' => \App\GraphQL\Queries\Product\ProductsQuery::class
            ],

            'mutation' => [
                'createProduct' => \App\GraphQL\Mutations\Product\CreateProductMutation::class,
                'updateProduct' => \App\GraphQL\Mutations\Product\UpdateProductMutation::class,
                'deleteProduct' => \App\GraphQL\Mutations\Product\DeleteProductMutation::class
            ],

            'types' => [
                'Product' => \App\GraphQL\Types\ProductType::class
            ],
        ];
    }
}
