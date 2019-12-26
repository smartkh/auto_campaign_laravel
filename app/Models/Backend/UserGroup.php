<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Model;

class UserGroup extends Model
{
    // custom match table
    protected $table="user_groups";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
    ];
}
