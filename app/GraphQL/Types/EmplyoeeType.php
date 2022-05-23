<?php

namespace App\GraphQL\Types;

use App\Models\Emplyoee;
use GraphQL;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Type as GraphQLType;

class EmplyoeeType extends GraphQLType
{

    protected $attributes = [
        'name'          => 'Emplyoee',
        'description'   => 'A Emplyoee',
        'model'         => Emplyoee::class,
    ];

    public function fields(): array
    {

        return [
            'id' => [
                'type' => Type::nonNull(Type::int()),
            ],
            'name' => [
                'type' =>  Type::nonNull(Type::string()),
            ],
            'email' => [
                'type' =>  Type::nonNull(Type::string()),
            ],
            'phone' => [
                'type' =>  Type::nonNull(Type::string()),
            ],
            'job_positon' => [
                'type' =>  Type::nonNull(Type::string()),
            ],
            'gender' => [
                'type' =>  Type::nonNull(Type::string()),
            ],
            'salary' => [
                'type' =>  Type::nonNull(Type::string()),
            ],
            'hire_date' => [
                'type' =>  Type::nonNull(Type::string()),
            ],
            'birthday' => [
                'type' =>  Type::nonNull(Type::string()),
            ],
            'created_user' => [
                'type' => Type::int(),
            ],
            'createdUser' => [
                'type' => GraphQL::type('User'),
            ],
            'updated_user' => [
                'type' => Type::int(),
            ],
            'updatedUser' => [
                'type' => GraphQL::type('User'),
            ],
        ];
    }
}
