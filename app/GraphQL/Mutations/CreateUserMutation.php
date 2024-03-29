<?php

namespace App\GraphQL\Mutations;

use GraphQL;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Mutation;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class CreateUserMutation extends Mutation
{
    protected $attributes = [
        'name' => 'createUser'
    ];

    public function type(): Type
    {
        return GraphQL::type('User');
    }

    public function args(): array
    {
        return [

            'name' => [
                'name' => 'name',
                'type' =>  Type::nonNull(Type::string()),
                'rules' => [
                    'required',
                    'string',
                    'max:255',
                ],
            ],
            'email' => [
                'name' => 'email',
                'type' =>  Type::nonNull(Type::string()),
                'rules' => [
                    'required',
                    'email',
                    'unique:users,email',
                    'max:255',
                ],
            ],
            'password' => [
                'name' => 'password',
                'type' =>  Type::nonNull(Type::string()),
                'rules' => ['required', 'confirmed', 'max:255', Rules\Password::defaults()]
            ],
            'password_confirmation' => [
                'name' => 'password_confirmation',
                'type' =>  Type::nonNull(Type::string()),
            ]
        ];
    }

    public function resolve($root, $args)
    {
        $data = $args;
        $data['password'] = Hash::make($data['password']);
        $user = new User();
        $user->fill($data);
        $user->save();
        return $user;
    }
}
