<?php

namespace App\Console\Commands;

use App\Models\Admin;
use App\Models\Permission;
use App\Models\Role;
use Illuminate\Console\Command;

class MakePermissions extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'permissions:run';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Make default permissions';

    protected array $roleStructure, $mappings;

    protected ?Role $superAdmin = null;

    /**
     * Execute the console command.
     *
     * @return bool|int
     */
    public function handle(): bool|int
    {
        $this->setRoleStructure();
        $this->setPermissionMappings();
        $this->setRoleSuperadmin();
        $this->setSuperadminUser();

        $this->saveRolesAndPermissions();
        return true;
    }

    protected function setRoleStructure()
    {
        $this->roleStructure = config('permissions.roles_structure');
    }

    protected function setPermissionMappings()
    {
        $this->mappings = config('permissions.permissions_map');
    }

    protected function setRoleSuperadmin()
    {
        $this->superAdmin = Role::where('name', 'superadmin')->first();

        if ($this->superAdmin === null) {
            $this->superAdmin = Role::firstOrCreate([
                'name' => 'superadmin',
                'display_name' => 'superadmin',
                'description' => 'superadmin'
            ]);
        }
    }

    protected function setSuperadminUser()
    {
        $user = Admin::first();

        $user->roles()->attach($this->superAdmin->id);
    }

    protected function saveRolesAndPermissions()
    {
        foreach ($this->roleStructure as $roleName => $permissions) {
            $role = Role::firstOrCreate([
                'name' => $roleName,
                'display_name' => $roleName,
                'description' => $roleName
            ]);

            $rolePermissions = $this->getRolePermissions($permissions);
            $ids = $this->savePermissions($rolePermissions);
            $role->permissions()->syncWithoutDetaching($ids);
            $this->superAdmin->permissions()->syncWithoutDetaching($ids);
        }
    }

    protected function getRolePermissions(array $permissions): array
    {
        $permissionNames = [];
        foreach ($permissions as $permissionPrefix => $mappings) {
            $mappingsArray = explode(',', $mappings);

            foreach ($mappingsArray as $permission) {
                $permissionNames[] = $this->getPermissionFullName($permissionPrefix, $permission);
            }
        }

        return $permissionNames;
    }

    protected function getPermissionFullName(string $permissionPrefix, string $permission): string
    {
        $permissionName = $this->mappings[$permission] ?? $permission;
        return $permissionPrefix . '-' . $permissionName;
    }

    protected function savePermissions(array $permissions): array
    {
        $ids = [];
        foreach ($permissions as $permissionName) {
            $permission = Permission::firstOrCreate([
                'name' => $permissionName,
                'display_name' => $permissionName,
                'description' => $permissionName,
            ]);
            $ids[] = $permission->id;
        }

        return $ids;
    }

}
