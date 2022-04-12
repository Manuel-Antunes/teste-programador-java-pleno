<?php


namespace App\GraphQL\Queries\Product;

use App\Models\Product;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Query;

class ProductQuery extends Query
{
    protected $attributes = [
        'name' => 'product',
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
                'type' => Type::string(),
                'rules' => ['required']
            ]
        ];
    }

    public function resolve($root, $args)
    {
        return Product::findOrFail($args['code']);
    }
}