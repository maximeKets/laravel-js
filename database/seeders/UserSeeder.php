<?php
namespace Database\Seeders;

use App\Models\Comment;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        User::factory(10)->hasComment(5)->create();
        User::factory(10)->create
        ([
         'name'=>'maxime',
         'email'=>'m@k.fr'
        ]);

    }
}
