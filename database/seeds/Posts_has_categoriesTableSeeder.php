<?php

use Illuminate\Database\Seeder;

class Posts_has_categoriesTableSeeder extends Seeder
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
                'posts_id' =>1,
                'categories_id' => '6',
            ),
            array(
                'posts_id' =>2,
                'categories_id' => '2',
            ),
            array(
                'posts_id' =>3,
                'categories_id' => '3',
            ),
            array(
                'posts_id' =>4,
                'categories_id' => '4',
            )

        );

        DB::table('posts_has_categories')->insert($material);
    }
}
