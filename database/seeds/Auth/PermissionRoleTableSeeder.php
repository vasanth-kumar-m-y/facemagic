<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

/**
 * Class PermissionRoleTableSeeder.
 */
class PermissionRoleTableSeeder extends Seeder
{
    use DisableForeignKeys;

    /**
     * Run the database seed.
     *
     * @return void
     */
    public function run()
    {
        $this->disableForeignKeys();

        // Create Roles
        $superAdmin = Role::create(['name' => config('access.users.super_admin_role')]);
        $admin = Role::create(['name' => config('access.users.admin_role')]);
        $screening = Role::create(['name' => config('access.users.screening_role')]);
        $accounts = Role::create(['name' => config('access.users.accounts_role')]);
        $director = Role::create(['name' => config('access.users.director_role')]);
        $user = Role::create(['name' => config('access.users.default_role')]);

        // Create Permissions
        Permission::create(['name' => 'view backend']);

        // ALWAYS GIVE SUPER ADMIN ROLE ALL PERMISSIONS
        $superAdmin->givePermissionTo('view backend');

        // Assign Permissions to other Roles
        $admin->givePermissionTo('view backend');

        $this->enableForeignKeys();
    }
}
