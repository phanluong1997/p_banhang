<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data =[
            [
               'email'  => 'phanluong1997@gmail.com',
               'password' => bcrypt(123456),
               'level'      => 1
            ],
            [
                'email'  => 'phanluong2201@gmail.com',
                'password' => bcrypt(123456),
                'level'      => 1
             ],
        ];
        DB::table('l_users')->insert($data); 
    }
}
