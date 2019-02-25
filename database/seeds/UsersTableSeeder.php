<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('users')->delete();
        
        \DB::table('users')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Admin',
                'email' => 'admin@test.com',
                'email_verified_at' => '2019-02-22 23:06:52',
                'password' => bcrypt('123456'),
                'remember_token' => NULL,
                'created_at' => '2019-02-22 22:49:14',
                'updated_at' => '2019-02-22 22:49:14',
            ),
        ));
        
        
    }
}