<?php

namespace App\GraphQL\Mutations\User;

use App\Models\User;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Mutation;

class UpdateUserMutation extends Mutation
{
    protected $attributes = [
        'name' => 'updateUser',
        'description' => 'Updates a user'
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
        $user = User::findOrFail($args['code']);
        $user->fill($args);
        $user->save();

        return $user;
    }
}