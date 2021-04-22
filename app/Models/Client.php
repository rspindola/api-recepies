<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    public $table = 'oauth_clients';

    protected $fillable = [
        'name', 'secret', 'provider', 'redirect', 'personal_access_client', 'password_client', 'revoked'
    ];

    /**
     * Client belongsToMany Permission
     */
    public function permissions()
    {
        return $this->morphToMany(Permission::class, 'model', 'permission_has_model', 'model_id', 'permission_id');
    }
}
