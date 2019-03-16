<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	/*DB::table('users')->insert([
            'name' => Str::random(10),
            'email' => Str::random(10).'@gmail.com',
            'password' => bcrypt('secret'),
        ]);*/

        DB::table('users')->insert([
        	[
            'name' => 'Lê Đức Mạnh',
            'email' => 'leducmanh101198@gmail.com',
            'password' => bcrypt('123456'),
            'role_id' => '2',
        ],[
            'name' => 'Trần Văn Viết',
            'email' => 'viet123@gmail.com',
            'password' => bcrypt('123456'),
            'role_id' => '2',
        ]
    ]);
    }
}
