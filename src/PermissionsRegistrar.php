<?php

namespace OndrejBakan\Permissions;

use Illuminate\Contracts\Auth\Access\Gate;

class PermissionsRegistrar
{

    protected $gate;

    public function __construct(Gate $gate)
    {
        $this->gate = $gate;
    }

    public function registerPermissions()
    {
        $this->getAllPermissions()->each(function ($roles, $permission) {
            $this->gate->define($permission, function ($user) use ($roles) {
                return $user->hasRoles($roles);
            });
        });

        return true;
    }

    public function getAllPermissions()
    {
        $rolesWithPermissions = collect(config('ondrejbakan.permissions.config.permissions'));
        $permissionsWithRoles = collect([]);

        $rolesWithPermissions->each(function ($permissions, $role) use (&$permissionsWithRoles) {
            $permissions = collect($permissions);

            $permissions->each(function ($permission) use ($role, &$permissionsWithRoles) {
                if (!$permissionsWithRoles->has($permission)) {
                    $permissionsWithRoles[$permission] = collect($role);
                } else {
                    $permissionsWithRoles[$permission]->push($role);
                }
            });
        });

        return collect($permissionsWithRoles);
    }
}
