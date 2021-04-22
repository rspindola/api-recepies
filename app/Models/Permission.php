<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    protected $fillable = ['name'];

    public $timestamps = false;

    /**
     * Permission morphedByMany Client
     */
    public function clients()
    {
        return $this->morphedByMany(Client::class, 'permission_has_model');
    }
}
