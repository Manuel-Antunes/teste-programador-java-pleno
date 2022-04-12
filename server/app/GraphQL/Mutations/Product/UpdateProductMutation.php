<?php

namespace App\GraphQL\Mutations\Product;

use App\Models\Product;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Mutation;

class UpdateProductMutation extends Mutation
{
    protected $attributes = [
        'name' => 'updateProduct',
        'description' => 'Updates a product'
    ];

    public function type(): Type
    {
        return GraphQL::type('Product');
    }

    public function args(): array
    {
        return [
            'code' => [
                'name' => 'code',
                'type' => Type::nonNull(Type::string()),
            ],
            'user_name' => [
                'name' => 'user_name',
                'type' => Type::nonNull(Type::string()),
            ],
            'cpf' => [
                'name' => 'cpf',
                'type' => Type::nonNull(Type::string()),
            ],
            'phone_number' => [
                'name' => 'phone_number',
                'type' => Type::nonNull(Type::string()),
            ],
            'e-mail' => [
                'name' => 'e-mail',
                'type' => Type::nonNull(Type::string()),
            ],
        ];
    }

    public function resolve($root, $args)
    {
        $product = Product::findOrFail($args['code']);
        $product->fill($args);
        $product->save();

        return $product;
    }
}