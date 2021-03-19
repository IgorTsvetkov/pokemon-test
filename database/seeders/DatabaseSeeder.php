<?php

namespace Database\Seeders;

use App\Models\User;
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
        $user=new User();
        $user->name="test";
        //email equal login for api
        $user->email="admin@admin.com";
        $user->password=bcrypt("12345678");
        $user->save();
        // \App\Models\User::factory(10)->create();
    }
}
