<?php

namespace App\GraphQL\Queries;

use App\Models\Emplyoee;
use Closure;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Query;

class EmplyoeeListQuery extends Query
{

    protected $attributes = [
        'name'  => 'emplyoees',
    ];

    public function type(): Type
    {
        return  GraphQL::paginate('Emplyoee');
    }


    public function rules(array $args = []): array
    {
        return [
            'limit' => [
                'sometimes',
                'numeric',
                'min:1',
            ],
            'page' => [
                'sometimes',
                'numeric',
                'min:1',
            ],
        ];
    }

    public function args(): array
    {
        return [
            'limit' => [
                'name' => 'limit',
                'type' => Type::int(),
            ],
            'page' => [
                'name' => 'page',
                'type' => Type::int(),
            ],
        ];
    }

    public function resolve($root, array $args, $context, ResolveInfo $info, Closure $getSelectFields)
    {
        $fields = $getSelectFields();
        $select = $fields->getSelect();
        $with = $fields->getRelations();
        $limit = !empty($args['limit']) ? $args['limit'] : 10;
        $page = !empty($args['page']) ? $args['page'] : 1;

        return Emplyoee::query()->with($with)->select($select)->paginate($limit, ['*'], 'page', $page);
    }
}
