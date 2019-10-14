<?php

use Illuminate\Database\Seeder;
use App\Role;
use App\Module;

class DefaultModulesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('modules')->insert([
            ['name' => 'Heroes', 'url' => '/heroes/home', 'active' => true],
            ['name' => 'Monsters', 'url' => '/monsters/home', 'active' => true],
            ['name' => 'Admin', 'url' => '/admin', 'active' => false],
            ['name' => 'Users', 'url' => '/users/home', 'active' => false],
            ['name' => 'Roles', 'url' => '/roles/home', 'active' => false],
            ['name' => 'Modules', 'url' => '/modules/home', 'active' => false],
            ['name' => 'Rules', 'url' => '/rules', 'active' => false],
        ]);

        $role_admin_id = Role::where('name', '=', 'admin')->first()['id'];
        $role_user_id = Role::where('name', '=', 'user')->first()['id'];

        $mod_heroes_id = Module::where('name', '=', 'Heroes')->first()['id'];
        $mod_monsters_id = Module::where('name', '=', 'Monsters')->first()['id'];
        $mod_admin_id = Module::where('name', '=', 'Admin')->first()['id'];
        $mod_users_id = Module::where('name', '=', 'Users')->first()['id'];
        $mod_roles_id = Module::where('name', '=', 'Roles')->first()['id'];
        $mod_modules_id = Module::where('name', '=', 'Modules')->first()['id'];
        $mod_rules_id = Module::where('name', '=', 'Rules')->first()['id'];

        DB::table('role_module')->insert([
            ['role_id' => $role_admin_id, 'module_id' => $mod_heroes_id],
            ['role_id' => $role_admin_id, 'module_id' => $mod_monsters_id],
            ['role_id' => $role_admin_id, 'module_id' => $mod_admin_id],

            ['role_id' => $role_admin_id, 'module_id' => $mod_users_id],
            ['role_id' => $role_admin_id, 'module_id' => $mod_roles_id],
            ['role_id' => $role_admin_id, 'module_id' => $mod_modules_id],
            ['role_id' => $role_admin_id, 'module_id' => $mod_rules_id],

            ['role_id' => $role_user_id, 'module_id' => $mod_heroes_id],
            ['role_id' => $role_user_id, 'module_id' => $mod_monsters_id],
        ]);
    }
}
