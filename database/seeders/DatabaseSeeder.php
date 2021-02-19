<?php

namespace Database\Seeders;

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
        \App\Models\User::factory(40)->create()
        ->each(function($user){
            $user->store()->save(\App\Models\Store::factory()->make());
        })
        ->each(function($user){
            $user->store->products()->save(\App\Models\Product::factory()->make());
        });
    }
}
