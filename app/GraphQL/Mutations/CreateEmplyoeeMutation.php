<?php

namespace App\GraphQL\Mutations;

use App\Models\Emplyoee;
use GraphQL;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Mutation;

class CreateEmplyoeeMutation extends Mutation
{
    protected $attributes = [
        'name' => 'createEmplyoee',
    ];


    public function rules(array $args = []): array
    {
        return [
            'name' => [
                'required', 'max:50'
            ],
            'email' => [
                'required', 'email', 'unique:emplyoees,email',
            ],
            'phone' => [
                'required', 'string', 'unique:emplyoees,phone',
            ],
            'job_positon' => [
                'required', 'string', 'max:255',
            ],
            'gender' => [
                'required', 'string', 'max:255',
            ],
            'salary' => [
                'required'
            ],
            'hire_date' => [
                'required'
            ],
            'birthday' => [
                'required'
            ],

        ];
    }

    public function type(): Type
    {
        return GraphQL::type('Emplyoee');
    }

    public function args(): array
    {
        return [
            'name' => [
                'name' => 'name',
                'type' =>  Type::nonNull(Type::string()),
            ],
            'email' => [
                'name' => 'email',
                'type' =>  Type::nonNull(Type::string()),
            ],
            'phone' => [
                'name' => 'phone',
                'type' =>  Type::nonNull(Type::string()),
            ],
            'job_positon' => [
                'name' => 'job_positon',
                'type' =>  Type::nonNull(Type::string()),
            ],
            'gender' => [
                'name' => 'job_positon',
                'type' =>  Type::nonNull(Type::string()),
            ],
            'salary' => [
                'name' => 'salary',
                'type' =>  Type::nonNull(Type::float()),
            ],
            'hire_date' => [
                'name' => 'hire_date',
                'type' =>  Type::nonNull(Type::string()),
            ],
            'birthday' => [
                'name' => 'birthday',
                'type' =>  Type::nonNull(Type::string()),
            ],
            'gender' => [
                'name' => 'gender',
                'type' =>  Type::nonNull(Type::string()),
            ],

        ];
    }

    public function resolve($root, $args)
    {
        $emplyoee = new Emplyoee();
        $emplyoee->fill($args + ['created_user' => auth()->id()]);
        $emplyoee->save();
        return $emplyoee;
    }
}
