<?php

namespace App\GraphQL\Mutations\User;

use App\Models\User;
use Rebing\GraphQL\Support\Mutation;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;

class CreateUserMutation extends Mutation
{
    protected $attributes = [
        'name' => 'createUser',
        'description' => 'Creates a user'
    ];

    public function type(): Type
    {
        return GraphQL::type('User');
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
        $user = new User();
        $user->fill($args);
        $user->save();

        return $user;
    }
}