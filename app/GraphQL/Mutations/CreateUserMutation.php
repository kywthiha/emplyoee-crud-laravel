<?php

namespace App\GraphQL\Mutations;

use GraphQL;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Mutation;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

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
                ],
            ],
            'email' => [
                'name' => 'email',
                'type' =>  Type::nonNull(Type::string()),
                'rules' => [
                    'required',
                    'email',
                    'unique:users,email'
                ],
            ],
            'password' => [
                'name' => 'password',
                'type' =>  Type::nonNull(Type::string()),
                'rules' => [
                    'required',
                    'min:5',
                ],
            ],
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
