<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
            'user_id'   => 1,
            'name'     => 'Loving letter'
        ]);

        Category::create([
            'user_id'   => 1,
            'name'     => 'Action lego'
        ]);

        Category::create([
            'user_id'   => 1,
            'name'     => 'Movie'
        ]);

        Category::create([
            'user_id'   => 2,
            'name'     => 'Loving letter for test user 2'
        ]);
    }
}
