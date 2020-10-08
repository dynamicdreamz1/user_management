<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserSeeder::class);
        factory(\App\Models\User::class,10)->create();
        factory(\App\Models\ProductCategory::class,10)->create();
        factory(\App\Models\Product::class,200)->create();
    }
}
