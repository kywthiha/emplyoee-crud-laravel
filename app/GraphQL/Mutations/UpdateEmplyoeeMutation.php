<?php

namespace App\GraphQL\Mutations;

use App\Models\Emplyoee;
use GraphQL;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Mutation;
use Illuminate\Validation\Rule;

class UpdateEmplyoeeMutation extends Mutation
{
    protected $attributes = [
        'name' => 'updateEmplyoee',
    ];


    public function rules(array $args = []): array
    {
        return [
            'name' => [
                'required', 'max:50'
            ],
            'email' => [
                'required', 'email',  isset($args['email']) ? Rule::unique('emplyoees')->ignore($args['id']) : 'unique:emplyoees,phone',
            ],
            'phone' => [
                'required', 'string', isset($args['phone']) ? Rule::unique('emplyoees')->ignore($args['id']) : 'unique:emplyoees,phone',
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
            'id' => [
                'name' => 'id',
                'type' =>  Type::nonNull(Type::int()),
            ],
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
        $emplyoee = Emplyoee::findOrFail($args['id']);
        $emplyoee->fill($args + ['updated_user' => auth()->id()]);
        $emplyoee->save();
        return $emplyoee;
    }
}
