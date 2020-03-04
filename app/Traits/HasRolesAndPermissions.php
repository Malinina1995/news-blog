<?php

    namespace App\Traits;

    use App\Models\Permission;
    use App\Models\Role;
    use Illuminate\Database\Eloquent\Relations\BelongsToMany;

    trait HasRolesAndPermissions
    {
        /**
         * @return BelongsToMany
         */
        public function roles()
        {
            return $this->belongsToMany(Role::class, 'users_roles');
        }

        public function hasRole(...$roles)
        {
            foreach ($roles as $role) {
                if ($this->roles->contains('slug', $role)) {
                    return true;
                }
            }
            return false;
        }

        /**
         * @param $permission
         * @return bool
         */
        public function hasPermissionTo(Permission $permission)
        {
            return $this->hasPermissionThroughRole($permission) || $this->hasPermission($permission);
        }

        public function hasPermissionThroughRole(Permission $permission)
        {
            foreach ($permission->roles as $role) {
                if ($this->roles->contains($role)) {
                    return true;
                }
            }
            return false;
        }

        public function hasPermission(Permission $permission)
        {
            return (bool)$this->permissions()->where('slug', $permission->slug)->count();
        }

        public function deletePermissions(...$permissions)
        {
            $permissions = $this->getAllPermissions($permissions);
            $this->permissions()->detach($permissions);
            return $this;
        }

        protected function getAllPermissions(array $permissions)
        {
            return Permission::whereIn('slug', $permissions)->get();
        }

        /**
         * @return BelongsToMany
         */
        public function permissions()
        {
            return $this->belongsToMany(Permission::class, 'users_permissions');
        }

        /**
         * @param mixed ...$permissions
         * @return HasRolesAndPermissions
         */
        public function refreshPermissions(...$permissions)
        {
            $this->permissions()->detach();
            return $this->givePermissionsTo($permissions);
        }

        /**
         * @param mixed ...$permissions
         * @return $this
         */
        public function givePermissionsTo(...$permissions)
        {
            $permissions = $this->getAllPermissions($permissions);
            if ($permissions === null) {
                return $this;
            }
            $this->permissions()->saveMany($permissions);
            return $this;
        }
    }
