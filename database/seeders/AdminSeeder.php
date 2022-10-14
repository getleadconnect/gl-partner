<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admins = array(
          array(
            'name'  => 'SuperAdmin',
            'email' => 'superadmin@superadmin.com',
            'password'  => Hash::make('passwordsecret'),
            'role_id' => '1',
          
          ),
          array(
          'name'    => 'Akhil',
            'email' => 'admin@admin.com',
            'password'  => Hash::make('password'),
            'role_id' => '1',
           
          )
        );
        \App\Models\Admin::insert($admins);




        // DB::table('admins')->insert([
        // 	'name'	=> 'Akhil',
        // 	'email'	=> 'admin@admin.com',
        // 	'password'	=> Hash::make('password')
        // ]);
    }
}
