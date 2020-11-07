<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
             Category::create(['name'=>'Rock']);
             Category::create(['name'=>'Pop']);
             Category::create(['name'=>'Heavy Metal']);
             Category::create(['name'=>'Flok']);
             Category::create(['name'=>'Clasical']);
             Category::create(['name'=>'Alarms']);
             Category::create(['name'=>'Sms']);
             Category::create(['name'=>'Jazz']);
             Category::create(['name'=>'Funny']);

             User::create([
                 'name'=>'kalam',
                 'email'=>'kalam12@gmail.com',
                 'password'=>bcrypt('1234'),

             ]);


        // \App\Models\User::factory(10)->create();
    }
}
