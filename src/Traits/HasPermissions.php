<?php

namespace OndrejBakan\Permissions\Traits;

trait HasPermissions
{

    /**
    * Simulate permissions property.
    *
    * @return Illuminate\Support\Collection
    */
    public function getPermissionsAttribute()
    {
        return $this->permissions();
    }

    /**
    * Define permissions relationship.
    *
    * @return Illuminate\Support\Collection
    */
    public function permissions()
    {
        $permissions = collect(config('ondrejbakan.permissions.permissions.admin'));

        return $permissions;
    }

}
