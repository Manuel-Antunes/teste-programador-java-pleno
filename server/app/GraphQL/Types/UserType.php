<?php

// app/graphql/types/CategoryType 

namespace App\GraphQL\Types;

use App\Models\User;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Type as GraphQLType;

class UserType extends GraphQLType
{
    protected $attributes = [
        'name' => 'User',
        'description' => '',
        'model' => User::class
    ];

    public function fields(): array
    {
        return [
            'code' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'User code'
            ],
            'user_name' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'Nome do usuario'
            ],
            'cpf' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'Cpf do usuario'
            ],
            'phone_number' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'telefone do usuario'
            ],
            'email' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'email do usuario'
            ],
            'orders' => [
                'type' => Type::listOf(GraphQL::type('Order')),
                'description' => 'Lista de pedidos'
            ]
        ];
    }
}