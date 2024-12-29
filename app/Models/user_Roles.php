<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class user_Roles extends Model
{
    public $table = 'roles_user';
    /** @use HasFactory<\Database\Factories\UserRolesFactory> */
    use HasFactory;

    protected $fillable = ['user_id', 'roles_id'];

}
