<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
         $this->call(PostsTableSeeder::class);
         $this->call(Users_has_postsTableSeeder::class);

         $this->call(CategoriesTableSeeder::class);
         $this->call(Posts_has_categoriesTableSeeder::class);
    }
}
