<?php

use Illuminate\Database\Seeder;

class AuthorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('authors')->insert([
            [
                'first_name' => 'Yuval Noah',
                'last_name' => 'Harari',
            ],
            [
                'first_name' => 'Herman',
                'last_name' => 'Hesse',
            ],
            [
                'first_name' => 'Jean-Paul',
                'last_name' => 'Sartre'
            ]
        ]);
    }
}
