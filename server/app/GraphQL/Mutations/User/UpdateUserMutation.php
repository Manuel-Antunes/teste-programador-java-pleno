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
                'type' => Type::string(),
            ],
            'cpf' => [
                'name' => 'cpf',
                'type' => Type::string(),
            ],
            'phone_number' => [
                'name' => 'phone_number',
                'type' => Type::string(),
            ],
            'email' => [
                'name' => 'email',
                'type' => Type::string(),
            ],
        ];
    }

    protected function rules(array $args = []): array
    {
        return [
            'email' => ['required', 'email'],
            'phone_number' => ['required'],
            'user_name' => ['required']
        ];
    }

    public function validationErrorMessages(array $args = []): array
    {
        return [
            'email.email' => 'E-mail inválido!'
        ];
    }

    public function resolve($root, $args)
    {

        //$args['code'] = sha1(time());
        if(isset($args['cpf']) && strlen(preg_replace( '/[^0-9]/is', '', $args['cpf'])) !== 11){
            return 'cpf invalido';
        }

        $user = User::where('code', $args['code'])->first();
        $user->fill($args);
        $user->save();

        return $user;
    }
}