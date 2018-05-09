<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
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
                'id' =>1,
                'title' => 'Snacks',
                'name' => 'Snacks'

            ),

            array(
                'id' =>2,
                'title' => "Meat",
                'name' => "Meat"

            ),
            array(
                'id' =>3,
                'title' => 'Fruits',
                'name' => 'Fruits'

            ),
            array(
                'id' =>4,
                'title' => "Grains",
                'name' => "Grains"

            ),
            array(
                'id' =>5,
                'title' => "National",
                'name' => "National"

            ),
            array(
                'id' =>6,
                'title' => "Salads",
                'name' => "Salads"

            ),

        );

        DB::table('categories')->insert($material);
    }
}
