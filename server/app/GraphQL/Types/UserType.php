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
            'codigo' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'ID of quest'
            ],
            'nome' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'Nome do usuario'
            ],
            'cpf' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'Cpf do usuario'
            ],
            'telefone' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'telefone do usuario'
            ],
            'e-mail' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'email do usuario'
            ],
            'pedidos' => [
                'type' => Type::listOf(GraphQL::type('Pedidos')),
                'description' => 'Lista de pedidos'
            ]
        ];
    }
}