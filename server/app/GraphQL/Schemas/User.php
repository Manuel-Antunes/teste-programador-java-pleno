<?php

namespace App\GraphQL\Schemas;

use Rebing\GraphQL\Support\Contracts\ConfigConvertible;

class User implements ConfigConvertible
{
    public function toConfig(): array
    {
        return [
            'query' => [
                'user' => \App\GraphQL\Queries\User\UserQuery::class,
                'users' => \App\GraphQL\Queries\User\UsersQuery::class
            ],

            'mutation' => [
                'createUser' => \App\GraphQL\Mutations\User\CreateUserMutation::class,
                'updateUser' => \App\GraphQL\Mutations\User\UpdateUserMutation::class,
                'deleteUser' => \App\GraphQL\Mutations\User\DeleteUserMutation::class
            ],

            'types' => [
                'User' => \App\GraphQL\Types\UserType::class
            ],
        ];
    }
}
