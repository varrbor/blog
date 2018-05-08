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
        $material = array(
            array(
                'id' =>1,
                'name' => 'Bohdan',
                'surname' => 'Null',
                'email' => 'varrbor@ukr.net',
                'password' => '$2y$10$Zl8fmH4JyDqqQGYhh2WsFu6X4gSwsMxUu4d4fqZk2KcUxPsQkSUrW',
                'remember_token' => 'PPFQX0JG5kOJDThK1CN1D6faNYYVxXJvBf5NXVSwv2G5pFJEmvPbDpWfHCzL',
                'created_at' => '2018-05-07 19:33:14',
                'updated_at' =>'2018-05-07 19:33:14'
            ),

        );

        DB::table('users')->insert($material);
    }
}
