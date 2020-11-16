<?php

use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data=[
            [
                'name'  => 'iPhone',
                'slug'  => str_slug('iPhone')
            ],
            [
                'name'  => 'SamSung',
                'slug'  => str_slug('SamSung')
            ]
        ];
        DB::table('l_cate')->insert($data);
    }
}
