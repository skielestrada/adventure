<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;

class DefaultUsers extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DB::table('users')->insert([
            [
            	'name' => 'admin', 
            	'email' => 'admin@mail.com',
            	'password' => bcrypt('admin1234'),
            ],
            [
            	'name' => 'user', 
            	'email' => 'user@mail.com',
            	'password' => bcrypt('user1234'),
            ],
            
        ]);

        DB::table('roles')->insert([
            ['name' => 'admin'],
            ['name' => 'user'],
        ]);

        $user_admin_id = User::where('name', '=', 'admin')->first()['id'];
        $user_user_id = User::where('name', '=', 'user')->first()['id'];

        $role_admin_id = Role::where('name', '=', 'admin')->first()['id'];
        $role_user_id = Role::where('name', '=', 'user')->first()['id'];

        DB::table('role_user')->insert([
            ['role_id' => $role_admin_id, 'user_id' => $user_admin_id],
            ['role_id' => $role_user_id, 'user_id' => $user_user_id],
        ]);
    }
}
