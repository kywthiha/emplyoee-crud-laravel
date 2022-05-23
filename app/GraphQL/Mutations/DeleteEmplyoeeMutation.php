<?php

namespace App\GraphQL\Mutations;

use App\Models\Emplyoee;
use GraphQL;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Mutation;

class DeleteEmplyoeeMutation extends Mutation
{
    protected $attributes = [
        'name' => 'deleteEmplyoee',
    ];




    public function type(): Type
    {
        return Type::boolean();
    }

    public function args(): array
    {
        return [
            'id' => [
                'name' => 'id',
                'type' => Type::nonNull(Type::int()),
                'rules' => ['exists:emplyoees']
            ]
        ];
    }

    public function resolve($root, $args)
    {
        $emplyoee = Emplyoee::findOrFail($args['id']);
        return  $emplyoee->delete() ? true : false;
    }
}
