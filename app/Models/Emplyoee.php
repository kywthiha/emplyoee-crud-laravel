<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Emplyoee extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'job_positon',
        'gender',
        'salary',
        'hire_date',
        'birthday',
        'created_user',
        'updated_user',
    ];

    public function createdUser()
    {
        return $this->belongsTo(User::class, 'created_user');
    }

    public function updatedUser()
    {
        return $this->belongsTo(User::class, 'updated_user');
    }
}
