<?php

namespace OndrejBakan\Permissions\Traits;

trait HasRoles
{
    public function hasRoles($roles)
    {
        foreach($roles as $role) {
            if ($this->roles->contains('name', $role)) {
                return true;
            };
        }

        return false;
    }
}
