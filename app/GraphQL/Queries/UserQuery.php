<?php

namespace App\GraphQL\Queries;

use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Query;

class UserQuery extends Query
{

    protected $attributes = [
        'name'  => 'user',
    ];

    public function type(): Type
    {
        return  GraphQL::type('User');
    }

    public function resolve($root, $args)
    {
        return auth()->user();
    }
}
