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
            'email' => [
                'name' => 'email',
                'type' => Type::nonNull(Type::string()),
            ],
        ];
    }

    protected function rules(array $args = []): array
    {
        return [
            'email' => ['required', 'email', 'unique:users'],
            'phone_number' => ['required'],
            'user_name' => ['required'],
            'cpf' => ['required', 'unique:users']
        ];
    }

    public function validationErrorMessages(array $args = []): array
    {
        return [
            'cpf.unique' => 'CPF já cadastrado!',
            'email.unique' => 'E-mail já cadastrado',
            // 'email.required' => 'Please enter your email address',
            // 'email.email' => 'Please enter a valid email address',
            // 'email.exists' => 'Sorry, this email address is already in use',
        ];
    }

    public function resolve($root, $args)
    {
        $args['code'] = sha1(time());

        if (strlen(preg_replace('/[^0-9]/is', '', $args['cpf'])) !== 11) {
            return null;
        }

        $user = new User();
        $user->fill($args);
        $user->save();

        return $user;
    }
}
