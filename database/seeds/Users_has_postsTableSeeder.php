<?php

use Illuminate\Database\Seeder;

class Users_has_postsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $material = array(
            array(
                'users_id' =>1,
                'posts_id' => 1
            ),  array(
                'users_id' =>1,
                'posts_id' => 2
            ),  array(
                'users_id' =>1,
                'posts_id' => 3
            ),  array(
                'users_id' =>1,
                'posts_id' => 4
            ),
        );

        DB::table('users_has_posts')->insert($material);
    }
}
