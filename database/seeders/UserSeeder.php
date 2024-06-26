<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
          User::factory(50)->create();
        User::factory(1)->create([
            'firstname' => 'maxime',
            'lastname' => 'kets',
            'email' => 'm@k.fr',
        ]);
    }
}
