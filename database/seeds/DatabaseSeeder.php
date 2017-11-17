<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()    {
        // $this->call(UsersTableSeeder::class);
        factory(App\User::class, 2)->create();
//        factory(App\Category::class, 12)->create();
//        factory(App\SubCategory::class, 12)->create();
//        factory(App\Mainmenu::class, 12)->create();
//        factory(App\Brand::class, 10)->create();
    }


}
