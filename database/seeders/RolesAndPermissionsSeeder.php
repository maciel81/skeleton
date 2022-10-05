<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // create role|user SuperAdmin
        $roleSuperAdmin = Role::create(['name' => 'super-admin']);
        $user = User::create([
            'name' => 'Administrador do Sistema',
            'username' => 'SysAdmin',
            'password' => Hash::make('a'),
            'active' => 1,
        ]);
        $user->assignRole($roleSuperAdmin);

        // create role Admin
        Role::create(['name' => 'admin']);

    }
}
