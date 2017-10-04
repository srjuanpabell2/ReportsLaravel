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
        factory(\App\Models\Person\Person::class, 1)->create([
            'name' => 'Juan Pablo',
            'last_name' => 'Torres',
            'gender' => 'male'
        ]);

        factory(\App\Person::class, 1)->create([
            'name' => 'Lorena',
            'last_name' => 'Mazo',
            'gender' => 'female'
        ]);
    }
}
