<?php

namespace App\GraphQL\Queries;

use App\Models\Emplyoee;
use Closure;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Query;

class EmplyoeeQuery extends Query
{

    protected $attributes = [
        'name'  => 'emplyoee',
    ];

    public function type(): Type
    {
        return  GraphQL::type('Emplyoee');
    }

    public function args(): array
    {
        return [
            'id' => [
                'name' => 'id',
                'type' =>  Type::nonNull(Type::int()),
            ],
        ];
    }

    public function resolve($root, array $args, $context, ResolveInfo $info, Closure $getSelectFields)
    {
        $fields = $getSelectFields();
        $with = $fields->getRelations();
        $emplyoee = Emplyoee::findOrFail($args['id']);
        $emplyoee->load($with);
        return $emplyoee;
    }
}
