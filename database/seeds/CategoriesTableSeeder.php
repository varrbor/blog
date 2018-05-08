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
//        DB::table('categories')->insert([
//            'title' => str_random(10),
//            'name' => str_random(10),
//            'content' => str_random(10),
//            'url' => str_random(10),
//        ]);

        factory(App\User::class, 50)->create()->each(function ($u) {
            $u->posts()->save(factory(App\Post::class)->make());
        });
    }
}
