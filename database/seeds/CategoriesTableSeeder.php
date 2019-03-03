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
        $data = [
            ['name' => 'shopping'],
            ['name' => 'activities'],
            ['name' => 'job']
        ];

        \App\Category::insert($data);
    }
}
