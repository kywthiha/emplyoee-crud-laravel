<?php

namespace App\GraphQL\Mutations;


use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Mutation;


class UserLogoutMutation extends Mutation
{
    protected $attributes = [
        'name' => 'logout'
    ];

    public function type(): Type
    {
        return Type::boolean();
    }

    public function resolve($root, $args)
    {
        return auth()->user()->token()->revoke();
    }
}
